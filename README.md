# article-rewriter-api
Paraphrases submited article, essay or any other piece of writing. A.K.A. article spinner. 

After investigating many article spinners, I have discovered one which produces the most comprehensible content of all and made an API wrapper for it.

## Usage
Install composer components `composer install`

Request must be in `application/json`

Example `POST` request to `http://yourawesomehost.com/article-rewriter-api/rewrite` with the text you want to check:
```json
{
    "text":"My pleasure Kim. Please spread the word about the list through the independent bookstores. I know 
that many of the independent bookstores have blogs or websites. Thank you for your reviews of Indie books. 
What do you think of that amazing journey?",
    "include_capitalized": true
}
```

Example `JSON` response:
```json
{
    "success": true,
    "message": "Image processed successfully",
    "data": {
        "rewritten_text": "My pleasure Kim. It would be ideal if you spread the news about the rundown through 
the autonomous book shops. I realize that a hefty portion of the autonomous book shops have web journals or 
sites. Much obliged to you for your audits of Indie books. What do you think about that stunning trip?"
    }
}
```

### Note
Use this at your own risk, as it depends on a third party. Consider using a proxy too.
