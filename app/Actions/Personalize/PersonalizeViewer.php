<?php

namespace App\Actions\Personalize;
use App\Models\Viewer;

class PersonalizeViewer
{

    private function client() {

        $credentials = new \Aws\Credentials\Credentials(config('personalize.aws_key'), config('personalize.aws_secret'));
        return new \Aws\PersonalizeRuntime\PersonalizeRuntimeClient([
            'version'     => 'latest',
            'region'      => config('personalize.aws_region'),
            'credentials' => $credentials
        ]);
    }

    private function getRecommendations(Viewer $viewer) {
        $client = $this->client();
        $result = $client->getRecommendations([
            'campaignArn' => config('personalize.campaign_arn'), // REQUIRED
            'userId' => strval($viewer->id),
            // 'filterValues' =>  // To exclude items that have been clicked or streamed by a user, use the following filter expression:
            // 'itemId' =>  // when trained with RELATED_ITEMS recipe
        ]);
        return $result->get('itemList');
    }


    /**
     * Get recommendations for the viewer.
     *
     * @param  array  $personalized response
     * @return void
     */
    public function handle($viewer)
    {
        if( config('personalize.campaign_arn') == null ) return null;
        return $this->getRecommendations($viewer);
    }
}
