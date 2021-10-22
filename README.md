## Laravel AWS Personalize Demo

A demo app to show how the implementation results look like when AWS Personalize is trained with movie lens dataset.

## AWS hands on lab movie recommendations lab

Create real-time, personalized movie recommendations with Personalize hands on [AWS Lab Link](https://aws.amazon.com/getting-started/hands-on/real-time-movie-recommendations-amazon-personalize/)

---

Browse demo app on **[movies.figurava.com](https://movies.figurava.com/)**.

---

MovieLens' full dataset is used instead of small sub version. Dataset contains 26 million ratings, 1.1 million tags, 58000 movies 1900 anonymous viewers.

> **Note:** App is deployed to check results of personalize responses of the lab. Demo is not related to Amazon Web Services. Personalization results may differ according to your recipe settings. Demo is not a reference, it is intended to you save some time. Feel free to use as a starting point and try yourself.

## Installation

Clone this repository and install dependencies.

```bash
git clone https://github.com/guvener/laravel-aws-personalized-demo.git
composer install
# optional valet link
```


Open installed folder and copy sample environment file `.env.sample` to `.env` and set up.

```bash
cp .env.sample .env
php artisan key:generate
```

Configure your database in the `.env` file and run migrate.

```bash
php artisan migrate
```

[Download demo database dump and import.](https://github.com/guvener/personalized-movie-demo-data)


## Configuration
Configuration file: `config/personalize.php`

```php
[
    // App\Actions\Personalize/PersonalizeViewer needs following configurations filled to make AWS Personalize Requests
    'campaign_arn' => env('CAMPAIGN_ARN'),
    'aws_key' => env('AWS_ACCESS_KEY_ID'),
    'aws_secret' => env('AWS_SECRET_ACCESS_KEY'),
    'aws_region' => env('AWS_DEFAULT_REGION'),

    // App\Models\Link needs Open Movie Database API key filled to get movie metadata
    'omdb_key' => env('OMDB_KEY')
]
```

## Models and Data
- MySQL database dump can be downloaded on the [movie data repository](https://github.com/guvener/personalized-movie-demo-data).
- Default Laravel User and Jetstream tables are kept for later possible use cases.
- `movies`, `ratings`, `tags` and `links` tables are exactly as [movielens dataset ml-latest.zip](http://files.grouplens.org/datasets/movielens/).
- `viewers` table is introduced for storing movielens dataset's users (`users` table is reserved for Laravel).
- `viewers` table has cached personalized movie recommendations to review personalized responses before training your own personalized model.

## Suggestions
In this demo SageMaker is trained with `USER_PERSONALIZATION` recipe, consider `RELATED_ITEMS` recipe for getting similar movies.

## More to read

[Amazon Personalize Runtime for PHP Documentation](https://docs.aws.amazon.com/aws-sdk-php/v3/api/api-personalize-runtime-2018-05-22.html)

[Amazon Personalize dynamic filters blog post by AWS Feed](https://awsfeed.com/whats-new/machine-learning/amazon-personalize-now-supports-dynamic-filters-for-applying-business-rules-to-your-recommendations-on-the-fly)


## License

Laravel AWS Personalize Demo App is open-sourced software licensed under the [MIT license](LICENSE.md).
