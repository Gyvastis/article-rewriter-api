# article-rewriter-api
Paraphrases submited article, essay or any other piece of writing.

## Usage
Install composer components `composer install`

Request must be in `application/json`

Example `POST` request to `http://yourawesomehost.com/article-rewriter-api/rewrite` with the text you want to check:
```json
{
    "text":"My pleasure Kim. Please spread the word about the list through the independent bookstores. I know 
that many of the independent bookstores have blogs or websites. Thank you for your reviews of Indie books. 
I love you all very much.",
    "include_capitalized": false
}
```

Example `JSON` response:
```json
{
    "success": true,
    "message": "Image processed successfully",
    "data": {
        "rewritten_text": "My pleasure Kim. If it's not too much trouble spread the news about the rundown 
through the free book shops. I realize that a large portion of the autonomous book shops have online journals 
or sites. Much obliged to you for your audits of Indie books. I cherish all of you all that much.",
        "include_capitalized": false
    }
}
```

### Note
Use this at your own risk, as it depends on a third party. Consider using a proxy too.
