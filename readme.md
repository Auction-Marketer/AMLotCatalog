# AM Lot Catalog - ELS Client 

The task of the class is to enable communication with the auction and lot search engine based on ElasticSearch.

The solution is built to support multiple tenants and therefore requires configuration.

It is important not to make changes at the level of the client, but to develop the solution in such a way as to keep the code common for many tenants.

## Description:

The solution consists of two parts: 

### PHP Class AMLotCatalog:

Search engine client allowing integration with other software in PHP. We use this class for ex. to provide support for the `com_catalog` component for the Joomla CMS.

### Node app:

The part of the software that is responsible for sending directory updates to the search engine. Uses direct connection to the MySQl database to retrieve information about records, and subscribes to Redis to listen for information from the livebidding system.

## Preliminary explanation:

The search engine supports two types of documents: auctions and lots. 

Some fields are required for both types. However, you can attach other data that will be returned. It is important not to interfere with the application code but map the current data using the configuration file.

### Required fields for auction document:

| field         | type                                          | is required
| -------       | -------                                       | -------
| id            | Integer                                       | required
| name          | String                                        | required
| date          | UTC time in format `YYYY-MM-DD`T`H:i:s`Z      | required
| images        | array of Image Value Objects                  | optional
| description   | String                                        | optional
| data          | object/array with meta data                   | optional

### Required fields for lot document:

| field                 | type                          | is required
| -------               | -------                       | -------
| id                    | Integer                       | required
| auction_id            | Integer                       | required
| name                  | String                        | required
| finance               | Finance Value Object          | required
| images                | array of Image Value Objects  | optional
| description           | String                        | optional
| data                  | object/array with meta data   | optional

### Value Objects:

#### Image Value Object:
```
{
    path: 'String of relative or absolute path to image',
    title: 'null or Image title'
}
```

#### Finance Value Object:
```
{
    low_estimate: Float of amoaunt for ex 123.45 - optional,
    high_estimate: Float of amoaunt for ex 123.45 - optional,
    hammer_price: Float of amoaunt for ex 123.45 - optional,
    reserve_price: Float of amoaunt for ex 123.45 - optional,
    currency: 'GBP'
}
```

## Installation:

Installation is quite simple and consists of the following steps.

### 1. Create of .env file to provide basic configuration

### 2. Create the search_mappings.js to provide search engine rules

### 3. Index / Reindex run for the tenant

### 4. Start catalog updater app


## Configuration

### .env file

All of comments are provided in .env file.

### search_mappings.js file

