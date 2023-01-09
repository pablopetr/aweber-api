# Aweber API Integration for Laravel Framework
![aweber-min](https://user-images.githubusercontent.com/7885756/211224707-dc167997-352a-4a81-a80d-df4672cd311a.png)

## About
This package help the developers to integrate laravel apps with [Aweber Email Marketing Service](https://www.aweber.com/)

## How to use this package
Install the package running the following command:
> composer require pablopetr/aweber-api

Create a developer account in [Aweber portal](https://labs.aweber.com/) and create an app in [Aweber Developer](https://labs.aweber.com/apps) and with Client Type as Confidential
![image](https://user-images.githubusercontent.com/7885756/211225068-8fe04a6c-e9c7-4016-9201-7fb3f8e261f2.png)

Get the Client ID and Client Secret and add to environment variable

Set your keys adding to .env file:
AWEBER_CLIENT_ID=
AWEBER_CLIENT_SECRET=
AWEBER_REDIRECT_URI=

Run the artisan command:
> php artisan aweber:generate-tokens

Access the URL provided and login in your *Aweber Developer Account*:
![image](https://user-images.githubusercontent.com/7885756/211225212-e2225813-8f53-419f-9621-d0da18471a81.png)

Login in your Aweber Developer account to generate tokens:

![image](https://user-images.githubusercontent.com/7885756/211225401-5687f350-38fc-476d-a2cf-8778a9880794.png)

Copy the callback redirected URL and paste in console:
![image](https://user-images.githubusercontent.com/7885756/211225520-dc27bff8-b587-4f3b-8cb8-430968f297dd.png)

Add the the returned access token and refresh token to your .env file:
AWEBER_ACCESS_TOKEN=
AWEBER_REFRESH_TOKEN=
