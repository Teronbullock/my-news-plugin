# My News Plugin

This plugin utilizes the Wikipedia REST API to add 4 posts news to your page.

The main endpoint that I focused on was "https://en.wikipedia.org/api/rest_v1/feed/featured/2023/11/04".

## How to use.

### Add Endpoint to Plugin:
- Install and active the plugin.
- This will add a new admin page called "My News Plugin".
- Go to the "My News Plugin" admin page and add the Wikipedia endpoint "https://en.wikipedia.org/api/rest_v1/feed/featured/" to the "API URL" field.
- Now add the date you are looking for to the "API Date Parameter" ex."2023/11/04"
- Save the settings.
  
### Add News Post to Posts and Pages
- From the WP admin area create a new post or page.
- This plugin utilizes a shortcode in order to generate it's HTML, This means you have to add a shortcode block.
- Once you have the shortcode block, add this shortcode " [my_news_shortcode] "to the block.  
- This code will generate 4 news posts to your page. If you want to add another 4 posts you will need to add more shortcode blocks with the provided shortcode.