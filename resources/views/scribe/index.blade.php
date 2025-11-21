<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>Laravel API Documentation</title>

    <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset("/vendor/scribe/css/theme-default.style.css") }}" media="screen">
    <link rel="stylesheet" href="{{ asset("/vendor/scribe/css/theme-default.print.css") }}" media="print">

    <script src="https://cdn.jsdelivr.net/npm/lodash@4.17.10/lodash.min.js"></script>

    <link rel="stylesheet"
          href="https://unpkg.com/@highlightjs/cdn-assets@11.6.0/styles/obsidian.min.css">
    <script src="https://unpkg.com/@highlightjs/cdn-assets@11.6.0/highlight.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jets/0.14.1/jets.min.js"></script>

    <style id="language-style">
        /* starts out as display none and is replaced with js later  */
                    body .content .bash-example code { display: none; }
                    body .content .javascript-example code { display: none; }
            </style>

    <script>
        var tryItOutBaseUrl = "https://cms.logisticjourney.com";
        var useCsrf = Boolean();
        var csrfUrl = "/sanctum/csrf-cookie";
    </script>
    <script src="{{ asset("/vendor/scribe/js/tryitout-5.5.0.js") }}"></script>

    <script src="{{ asset("/vendor/scribe/js/theme-default-5.5.0.js") }}"></script>

</head>

<body data-languages="[&quot;bash&quot;,&quot;javascript&quot;]">

<a href="#" id="nav-button">
    <span>
        MENU
        <img src="{{ asset("/vendor/scribe/images/navbar.png") }}" alt="navbar-image"/>
    </span>
</a>
<div class="tocify-wrapper">
    
            <div class="lang-selector">
                                            <button type="button" class="lang-button" data-language-name="bash">bash</button>
                                            <button type="button" class="lang-button" data-language-name="javascript">javascript</button>
                    </div>
    
    <div class="search">
        <input type="text" class="search" id="input-search" placeholder="Search">
    </div>

    <div id="toc">
                    <ul id="tocify-header-introduction" class="tocify-header">
                <li class="tocify-item level-1" data-unique="introduction">
                    <a href="#introduction">Introduction</a>
                </li>
                            </ul>
                    <ul id="tocify-header-authenticating-requests" class="tocify-header">
                <li class="tocify-item level-1" data-unique="authenticating-requests">
                    <a href="#authenticating-requests">Authenticating requests</a>
                </li>
                            </ul>
                    <ul id="tocify-header-blog-categories" class="tocify-header">
                <li class="tocify-item level-1" data-unique="blog-categories">
                    <a href="#blog-categories">Blog Categories</a>
                </li>
                                    <ul id="tocify-subheader-blog-categories" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="blog-categories-GETapi-v1-categories">
                                <a href="#blog-categories-GETapi-v1-categories">List all blog categories.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="blog-categories-GETapi-v1-categories--category_slug--posts">
                                <a href="#blog-categories-GETapi-v1-categories--category_slug--posts">List posts in a category.</a>
                            </li>
                                                                        </ul>
                            </ul>
                    <ul id="tocify-header-blog-posts" class="tocify-header">
                <li class="tocify-item level-1" data-unique="blog-posts">
                    <a href="#blog-posts">Blog Posts</a>
                </li>
                                    <ul id="tocify-subheader-blog-posts" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="blog-posts-GETapi-v1-posts">
                                <a href="#blog-posts-GETapi-v1-posts">List all published blog posts.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="blog-posts-GETapi-v1-posts--post_slug-">
                                <a href="#blog-posts-GETapi-v1-posts--post_slug-">Get a single blog post.</a>
                            </li>
                                                                        </ul>
                            </ul>
                    <ul id="tocify-header-case-studies" class="tocify-header">
                <li class="tocify-item level-1" data-unique="case-studies">
                    <a href="#case-studies">Case Studies</a>
                </li>
                                    <ul id="tocify-subheader-case-studies" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="case-studies-GETapi-v1-case-studies">
                                <a href="#case-studies-GETapi-v1-case-studies">List all published case studies</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="case-studies-GETapi-v1-case-studies-featured">
                                <a href="#case-studies-GETapi-v1-case-studies-featured">Get the latest featured published case study</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="case-studies-GETapi-v1-case-studies--slug-">
                                <a href="#case-studies-GETapi-v1-case-studies--slug-">Show a single published case study by slug</a>
                            </li>
                                                                        </ul>
                            </ul>
                    <ul id="tocify-header-endpoints" class="tocify-header">
                <li class="tocify-item level-1" data-unique="endpoints">
                    <a href="#endpoints">Endpoints</a>
                </li>
                                    <ul id="tocify-subheader-endpoints" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="endpoints-GETapi-v1-blocks">
                                <a href="#endpoints-GETapi-v1-blocks">Display a listing of the resource.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-POSTapi-v1-blocks">
                                <a href="#endpoints-POSTapi-v1-blocks">Store a newly created resource in storage.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-v1-blocks--id-">
                                <a href="#endpoints-GETapi-v1-blocks--id-">Show the specified resource.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-PUTapi-v1-blocks--id-">
                                <a href="#endpoints-PUTapi-v1-blocks--id-">Update the specified resource in storage.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-DELETEapi-v1-blocks--id-">
                                <a href="#endpoints-DELETEapi-v1-blocks--id-">Remove the specified resource from storage.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-v1-pricings">
                                <a href="#endpoints-GETapi-v1-pricings">Display a listing of the resource.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-POSTapi-v1-pricings">
                                <a href="#endpoints-POSTapi-v1-pricings">Store a newly created resource in storage.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-v1-pricings--pricing-">
                                <a href="#endpoints-GETapi-v1-pricings--pricing-">Show the specified resource.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-PUTapi-v1-pricings--pricing-">
                                <a href="#endpoints-PUTapi-v1-pricings--pricing-">Update the specified resource in storage.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-DELETEapi-v1-pricings--pricing-">
                                <a href="#endpoints-DELETEapi-v1-pricings--pricing-">Remove the specified resource from storage.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-v1-pages-type--type-">
                                <a href="#endpoints-GETapi-v1-pages-type--type-">Get page by type (e.g., 'home', 'about', 'contact').</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-v1-websites">
                                <a href="#endpoints-GETapi-v1-websites">Display a listing of the resource.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-POSTapi-v1-websites">
                                <a href="#endpoints-POSTapi-v1-websites">Store a newly created resource in storage.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-v1-websites--website-">
                                <a href="#endpoints-GETapi-v1-websites--website-">Show the specified resource.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-PUTapi-v1-websites--website-">
                                <a href="#endpoints-PUTapi-v1-websites--website-">Update the specified resource in storage.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-DELETEapi-v1-websites--website-">
                                <a href="#endpoints-DELETEapi-v1-websites--website-">Remove the specified resource from storage.</a>
                            </li>
                                                                        </ul>
                            </ul>
                    <ul id="tocify-header-faqs" class="tocify-header">
                <li class="tocify-item level-1" data-unique="faqs">
                    <a href="#faqs">FAQs</a>
                </li>
                                    <ul id="tocify-subheader-faqs" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="faqs-GETapi-v1-faqs">
                                <a href="#faqs-GETapi-v1-faqs">List all FAQs</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="faqs-GETapi-v1-faqs--id-">
                                <a href="#faqs-GETapi-v1-faqs--id-">Get a specific FAQ</a>
                            </li>
                                                                        </ul>
                            </ul>
                    <ul id="tocify-header-form-submission" class="tocify-header">
                <li class="tocify-item level-1" data-unique="form-submission">
                    <a href="#form-submission">Form Submission</a>
                </li>
                                    <ul id="tocify-subheader-form-submission" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="form-submission-POSTapi-v1-pages--identifier--submit">
                                <a href="#form-submission-POSTapi-v1-pages--identifier--submit">Submit a form with Google reCAPTCHA verification.

This endpoint allows the frontend to submit any form (contact, demo request, etc.) with dynamic fields and Google reCAPTCHA protection. The form is identified by its slug (e.g., `contact-us`).

**Frontend Integration Notes:**
- Obtain a reCAPTCHA token from the frontend using your site key (`RECAPTCHA_SITE_KEY` from .env).
- Send the token in the `captcha` field of the request body.
- All required fields for the form will be validated dynamically based on backend configuration.
- On success, a confirmation email is sent to the user (if email is provided and valid).
- On failure, you will receive detailed validation errors or a captcha error.

**Request:**
- Method: POST
- URL: `/api/forms/{identifier}/submit`
- Content-Type: `application/json`</a>
                            </li>
                                                                        </ul>
                            </ul>
                    <ul id="tocify-header-forms" class="tocify-header">
                <li class="tocify-item level-1" data-unique="forms">
                    <a href="#forms">Forms</a>
                </li>
                                    <ul id="tocify-subheader-forms" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="forms-GETapi-v1-forms">
                                <a href="#forms-GETapi-v1-forms">List available forms with their fields and settings.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="forms-GETapi-v1-forms--identifier-">
                                <a href="#forms-GETapi-v1-forms--identifier-">Get a single form by slug or id. Useful for frontend to render dynamic forms.</a>
                            </li>
                                                                        </ul>
                            </ul>
                    <ul id="tocify-header-pages" class="tocify-header">
                <li class="tocify-item level-1" data-unique="pages">
                    <a href="#pages">Pages</a>
                </li>
                                    <ul id="tocify-subheader-pages" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="pages-GETapi-v1-pages">
                                <a href="#pages-GETapi-v1-pages">Display a listing of pages.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="pages-GETapi-v1-pages--identifier-">
                                <a href="#pages-GETapi-v1-pages--identifier-">Show a single page by slug or ID.</a>
                            </li>
                                                                        </ul>
                            </ul>
                    <ul id="tocify-header-policies" class="tocify-header">
                <li class="tocify-item level-1" data-unique="policies">
                    <a href="#policies">Policies</a>
                </li>
                                    <ul id="tocify-subheader-policies" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="policies-GETapi-v1-policies">
                                <a href="#policies-GETapi-v1-policies">List all policies</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="policies-GETapi-v1-policies--slug-">
                                <a href="#policies-GETapi-v1-policies--slug-">Get a policy by slug</a>
                            </li>
                                                                        </ul>
                            </ul>
            </div>

    <ul class="toc-footer" id="toc-footer">
                    <li style="padding-bottom: 5px;"><a href="{{ route("scribe.postman") }}">View Postman collection</a></li>
                            <li style="padding-bottom: 5px;"><a href="{{ route("scribe.openapi") }}">View OpenAPI spec</a></li>
                <li><a href="http://github.com/knuckleswtf/scribe">Documentation powered by Scribe ✍</a></li>
    </ul>

    <ul class="toc-footer" id="last-updated">
        <li>Last updated: November 21, 2025</li>
    </ul>
</div>

<div class="page-wrapper">
    <div class="dark-box"></div>
    <div class="content">
        <h1 id="introduction">Introduction</h1>
<aside>
    <strong>Base URL</strong>: <code>https://cms.logisticjourney.com</code>
</aside>
<pre><code>This documentation aims to provide all the information you need to work with our API.

&lt;aside&gt;As you scroll, you'll see code examples for working with the API in different programming languages in the dark area to the right (or as part of the content on mobile).
You can switch the language used with the tabs at the top right (or from the nav menu at the top left on mobile).&lt;/aside&gt;</code></pre>

        <h1 id="authenticating-requests">Authenticating requests</h1>
<p>To authenticate requests, include a <strong><code>Authorization</code></strong> header with the value <strong><code>"Bearer {YOUR_AUTH_TOKEN}"</code></strong>.</p>
<p>All authenticated endpoints are marked with a <code>requires authentication</code> badge in the documentation below.</p>
<p>Authenticate using a Bearer token from Sanctum. Example: <code>Bearer 14|KQEecOsc6NCmfB47ESS5wqJmB0KyydIHx9QcHnkP6c319277</code>.</p>

        <h1 id="blog-categories">Blog Categories</h1>

    

                                <h2 id="blog-categories-GETapi-v1-categories">List all blog categories.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETapi-v1-categories">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "https://cms.logisticjourney.com/api/v1/categories" \
    --header "Authorization: Bearer {YOUR_AUTH_TOKEN}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://cms.logisticjourney.com/api/v1/categories"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_TOKEN}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-v1-categories">
            <blockquote>
            <p>Example response (200, success):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: [
        {
            &quot;id&quot;: 1,
            &quot;name&quot;: &quot;Technology&quot;,
            &quot;slug&quot;: &quot;tech&quot;,
            &quot;description&quot;: &quot;Latest in technology and innovation&quot;,
            &quot;post_count&quot;: 25,
            &quot;featured_image&quot;: {
                &quot;url&quot;: &quot;https://example.com/images/tech.jpg&quot;,
                &quot;alt&quot;: &quot;Technology Category&quot;
            }
        },
        {
            &quot;id&quot;: 2,
            &quot;name&quot;: &quot;Business&quot;,
            &quot;slug&quot;: &quot;business&quot;,
            &quot;description&quot;: &quot;Business insights and trends&quot;,
            &quot;post_count&quot;: 18,
            &quot;featured_image&quot;: {
                &quot;url&quot;: &quot;https://example.com/images/business.jpg&quot;,
                &quot;alt&quot;: &quot;Business Category&quot;
            }
        }
    ]
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v1-categories" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-categories"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-categories"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-v1-categories" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-categories">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-v1-categories" data-method="GET"
      data-path="api/v1/categories"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-categories', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-v1-categories"
                    onclick="tryItOut('GETapi-v1-categories');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-v1-categories"
                    onclick="cancelTryOut('GETapi-v1-categories');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-v1-categories"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/categories</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-v1-categories"
               value="Bearer {YOUR_AUTH_TOKEN}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_TOKEN}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-v1-categories"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-v1-categories"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="blog-categories-GETapi-v1-categories--category_slug--posts">List posts in a category.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETapi-v1-categories--category_slug--posts">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "https://cms.logisticjourney.com/api/v1/categories/architecto/posts?q=cloud&amp;per_page=16" \
    --header "Authorization: Bearer {YOUR_AUTH_TOKEN}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://cms.logisticjourney.com/api/v1/categories/architecto/posts"
);

const params = {
    "q": "cloud",
    "per_page": "16",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_TOKEN}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-v1-categories--category_slug--posts">
            <blockquote>
            <p>Example response (200, success):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: [
        {
            &quot;id&quot;: 1,
            &quot;title&quot;: &quot;Introduction to Cloud Computing&quot;,
            &quot;slug&quot;: &quot;intro-to-cloud-computing&quot;,
            &quot;excerpt&quot;: &quot;Learn the basics of cloud computing...&quot;,
            &quot;type&quot;: &quot;article&quot;,
            &quot;featured_image&quot;: {
                &quot;url&quot;: &quot;https://example.com/images/cloud.jpg&quot;,
                &quot;alt&quot;: &quot;Cloud Computing&quot;
            },
            &quot;author&quot;: {
                &quot;id&quot;: 1,
                &quot;name&quot;: &quot;John Doe&quot;
            },
            &quot;published_at&quot;: &quot;2023-01-01T00:00:00Z&quot;
        }
    ],
    &quot;meta&quot;: {
        &quot;current_page&quot;: 1,
        &quot;total&quot;: 10,
        &quot;per_page&quot;: 15
    }
}</code>
 </pre>
            <blockquote>
            <p>Example response (404):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Category not found&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v1-categories--category_slug--posts" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-categories--category_slug--posts"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-categories--category_slug--posts"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-v1-categories--category_slug--posts" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-categories--category_slug--posts">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-v1-categories--category_slug--posts" data-method="GET"
      data-path="api/v1/categories/{category_slug}/posts"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-categories--category_slug--posts', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-v1-categories--category_slug--posts"
                    onclick="tryItOut('GETapi-v1-categories--category_slug--posts');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-v1-categories--category_slug--posts"
                    onclick="cancelTryOut('GETapi-v1-categories--category_slug--posts');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-v1-categories--category_slug--posts"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/categories/{category_slug}/posts</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-v1-categories--category_slug--posts"
               value="Bearer {YOUR_AUTH_TOKEN}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_TOKEN}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-v1-categories--category_slug--posts"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-v1-categories--category_slug--posts"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>category_slug</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="category_slug"                data-endpoint="GETapi-v1-categories--category_slug--posts"
               value="architecto"
               data-component="url">
    <br>
<p>The slug of the category. Example: <code>architecto</code></p>
            </div>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>category</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="category"                data-endpoint="GETapi-v1-categories--category_slug--posts"
               value="tech"
               data-component="url">
    <br>
<p>The category ID or slug. Example: <code>tech</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>q</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="q"                data-endpoint="GETapi-v1-categories--category_slug--posts"
               value="cloud"
               data-component="query">
    <br>
<p>Search in post titles. Example: <code>cloud</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>per_page</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="per_page"                data-endpoint="GETapi-v1-categories--category_slug--posts"
               value="16"
               data-component="query">
    <br>
<p>Number of posts per page. Default: 15 Example: <code>16</code></p>
            </div>
                </form>

                <h1 id="blog-posts">Blog Posts</h1>

    

                                <h2 id="blog-posts-GETapi-v1-posts">List all published blog posts.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETapi-v1-posts">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "https://cms.logisticjourney.com/api/v1/posts?type=article&amp;category=news&amp;q=cloud+computing&amp;per_page=16&amp;sort=published_at&amp;direction=desc" \
    --header "Authorization: Bearer {YOUR_AUTH_TOKEN}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://cms.logisticjourney.com/api/v1/posts"
);

const params = {
    "type": "article",
    "category": "news",
    "q": "cloud computing",
    "per_page": "16",
    "sort": "published_at",
    "direction": "desc",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_TOKEN}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-v1-posts">
            <blockquote>
            <p>Example response (200, success):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: [
        {
            &quot;id&quot;: 1,
            &quot;title&quot;: &quot;Introduction to Cloud Computing&quot;,
            &quot;slug&quot;: &quot;intro-to-cloud-computing&quot;,
            &quot;excerpt&quot;: &quot;Learn the basics of cloud computing...&quot;,
            &quot;type&quot;: &quot;article&quot;,
            &quot;featured_image&quot;: {
                &quot;url&quot;: &quot;https://example.com/images/cloud.jpg&quot;,
                &quot;alt&quot;: &quot;Cloud Computing Diagram&quot;
            },
            &quot;author&quot;: {
                &quot;id&quot;: 1,
                &quot;name&quot;: &quot;John Doe&quot;,
                &quot;avatar&quot;: &quot;https://example.com/avatars/john.jpg&quot;
            },
            &quot;categories&quot;: [
                {
                    &quot;id&quot;: 1,
                    &quot;name&quot;: &quot;Technology&quot;,
                    &quot;slug&quot;: &quot;tech&quot;
                }
            ],
            &quot;published_at&quot;: &quot;2023-01-01T00:00:00Z&quot;,
            &quot;reading_time&quot;: &quot;5 min&quot;
        }
    ],
    &quot;meta&quot;: {
        &quot;current_page&quot;: 1,
        &quot;total&quot;: 50,
        &quot;per_page&quot;: 15
    }
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v1-posts" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-posts"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-posts"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-v1-posts" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-posts">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-v1-posts" data-method="GET"
      data-path="api/v1/posts"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-posts', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-v1-posts"
                    onclick="tryItOut('GETapi-v1-posts');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-v1-posts"
                    onclick="cancelTryOut('GETapi-v1-posts');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-v1-posts"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/posts</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-v1-posts"
               value="Bearer {YOUR_AUTH_TOKEN}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_TOKEN}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-v1-posts"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-v1-posts"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>type</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="type"                data-endpoint="GETapi-v1-posts"
               value="article"
               data-component="query">
    <br>
<p>Filter posts by type (e.g. 'article', 'news'). Example: <code>article</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>category</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="category"                data-endpoint="GETapi-v1-posts"
               value="news"
               data-component="query">
    <br>
<p>Filter posts by category slug or ID. Example: <code>news</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>q</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="q"                data-endpoint="GETapi-v1-posts"
               value="cloud computing"
               data-component="query">
    <br>
<p>Search in title, excerpt and body. Example: <code>cloud computing</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>per_page</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="per_page"                data-endpoint="GETapi-v1-posts"
               value="16"
               data-component="query">
    <br>
<p>Number of posts per page. Default: 15 Example: <code>16</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>sort</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="sort"                data-endpoint="GETapi-v1-posts"
               value="published_at"
               data-component="query">
    <br>
<p>Field to sort by (published_at, title). Example: <code>published_at</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>direction</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="direction"                data-endpoint="GETapi-v1-posts"
               value="desc"
               data-component="query">
    <br>
<p>Sort direction (asc, desc). Example: <code>desc</code></p>
            </div>
                </form>

                    <h2 id="blog-posts-GETapi-v1-posts--post_slug-">Get a single blog post.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETapi-v1-posts--post_slug-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "https://cms.logisticjourney.com/api/v1/posts/architecto" \
    --header "Authorization: Bearer {YOUR_AUTH_TOKEN}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://cms.logisticjourney.com/api/v1/posts/architecto"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_TOKEN}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-v1-posts--post_slug-">
            <blockquote>
            <p>Example response (200, success):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: {
        &quot;id&quot;: 1,
        &quot;title&quot;: &quot;Introduction to Cloud Computing&quot;,
        &quot;slug&quot;: &quot;intro-to-cloud-computing&quot;,
        &quot;excerpt&quot;: &quot;Learn the basics of cloud computing...&quot;,
        &quot;body&quot;: &quot;Cloud computing is the delivery of computing services...&quot;,
        &quot;type&quot;: &quot;article&quot;,
        &quot;featured_image&quot;: {
            &quot;url&quot;: &quot;https://example.com/images/cloud.jpg&quot;,
            &quot;alt&quot;: &quot;Cloud Computing Diagram&quot;
        },
        &quot;author&quot;: {
            &quot;id&quot;: 1,
            &quot;name&quot;: &quot;John Doe&quot;,
            &quot;avatar&quot;: &quot;https://example.com/avatars/john.jpg&quot;,
            &quot;bio&quot;: &quot;Tech writer and cloud expert&quot;
        },
        &quot;categories&quot;: [
            {
                &quot;id&quot;: 1,
                &quot;name&quot;: &quot;Technology&quot;,
                &quot;slug&quot;: &quot;tech&quot;
            }
        ],
        &quot;published_at&quot;: &quot;2023-01-01T00:00:00Z&quot;,
        &quot;reading_time&quot;: &quot;5 min&quot;,
        &quot;meta&quot;: {
            &quot;description&quot;: &quot;Learn the fundamentals of cloud computing&quot;,
            &quot;keywords&quot;: &quot;cloud,computing,technology&quot;
        }
    }
}</code>
 </pre>
            <blockquote>
            <p>Example response (404):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Post not found&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v1-posts--post_slug-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-posts--post_slug-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-posts--post_slug-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-v1-posts--post_slug-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-posts--post_slug-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-v1-posts--post_slug-" data-method="GET"
      data-path="api/v1/posts/{post_slug}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-posts--post_slug-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-v1-posts--post_slug-"
                    onclick="tryItOut('GETapi-v1-posts--post_slug-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-v1-posts--post_slug-"
                    onclick="cancelTryOut('GETapi-v1-posts--post_slug-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-v1-posts--post_slug-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/posts/{post_slug}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-v1-posts--post_slug-"
               value="Bearer {YOUR_AUTH_TOKEN}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_TOKEN}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-v1-posts--post_slug-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-v1-posts--post_slug-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>post_slug</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="post_slug"                data-endpoint="GETapi-v1-posts--post_slug-"
               value="architecto"
               data-component="url">
    <br>
<p>The slug of the post. Example: <code>architecto</code></p>
            </div>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>post</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="post"                data-endpoint="GETapi-v1-posts--post_slug-"
               value="1"
               data-component="url">
    <br>
<p>The post ID. Example: <code>1</code></p>
            </div>
                    </form>

                <h1 id="case-studies">Case Studies</h1>

    <p>Endpoints for managing and viewing case studies.</p>
<p>Resource fields:</p>
<ul>
<li>id: int</li>
<li>title: string</li>
<li>slug: string</li>
<li>featured_image: string|null (main image, raw value)</li>
<li>client: object
<ul>
<li>name: string</li>
<li>logo: string|null (raw value)</li>
<li>quote: string</li>
<li>quote_author: string</li>
<li>quote_author_title: string</li>
</ul></li>
<li>content: object
<ul>
<li>banner: string|null (raw featured_image)</li>
<li>introduction: string</li>
<li>the_problem: string</li>
<li>the_solution: string</li>
<li>the_result: string</li>
<li>the_road_ahead: string</li>
</ul></li>
<li>sidebar: object
<ul>
<li>industry: string</li>
<li>location: string</li>
<li>engagement_type: string</li>
<li>implementation_period: string</li>
<li>solution: string</li>
<li>logo: string|null (URL)</li>
</ul></li>
<li>meta: object
<ul>
<li>meta_title: string|null</li>
<li>meta_description: string|null</li>
<li>status: string</li>
<li>is_featured: bool</li>
<li>published_at: string|null</li>
<li>created_at: string</li>
<li>updated_at: string</li>
</ul></li>
</ul>

                                <h2 id="case-studies-GETapi-v1-case-studies">List all published case studies</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETapi-v1-case-studies">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "https://cms.logisticjourney.com/api/v1/case-studies?featured=&amp;per_page=16" \
    --header "Authorization: Bearer {YOUR_AUTH_TOKEN}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://cms.logisticjourney.com/api/v1/case-studies"
);

const params = {
    "featured": "0",
    "per_page": "16",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_TOKEN}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-v1-case-studies">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: [
        {
            &quot;id&quot;: 1,
            &quot;title&quot;: &quot;How Logistic Journey Helped Turn Paper Chaos into Digital Clarity&quot;,
            &quot;slug&quot;: &quot;how-logistic-journey-helped-turn-paper-chaos-into-digital-clarity&quot;,
            &quot;featured_image&quot;: &quot;case-studies/featured-images/01KA98TBSPSSHKKG3JD079BMCK.jpg&quot;,
            &quot;client&quot;: {
                &quot;name&quot;: &quot;Park Avenue Stationers&quot;,
                &quot;logo&quot;: &quot;http://cms.logisticjourney.com/storage/case-studies/logos/01KA98TBS1C4MN0JF9WCQWB58C.png&quot;,
                &quot;quote&quot;: &quot;&ldquo;It&rsquo;s early days, but the difference is already clear. We can finally see what&rsquo;s really happening on the road &mdash; and that visibility changes everything.&rdquo;&quot;,
                &quot;quote_author&quot;: &quot;Devon Miles&quot;,
                &quot;quote_author_title&quot;: &quot;Operations Manager, Park Avenue Stationers&quot;
            },
            &quot;content&quot;: {
                &quot;banner&quot;: &quot;http://cms.logisticjourney.com/storage/case-studies/featured-images/01KA98TBSPSSHKKG3JD079BMCK.jpg&quot;,
                &quot;introduction&quot;: &quot;&lt;p&gt;Park Avenue Stationers is a long-established distributor of office supplies, serving schools, corporates, and small businesses across South Africa. With a busy fleet of delivery vehicles, their challenge wasn&rsquo;t about getting goods out the door &mdash; it was about how they got there.&lt;/p&gt;&lt;p&gt;Before partnering with Logistic Journey, inefficiencies in route planning and delivery tracking were costing them precious time, fuel, and customer satisfaction.&lt;/p&gt;&quot;,
                &quot;the_problem&quot;: &quot;&lt;p&gt;Park Avenue Stationers&rsquo; delivery process had evolved over time &ndash; but not necessarily forward.&lt;/p&gt;&lt;ol start=\&quot;1\&quot;&gt;&lt;li&gt;&lt;p&gt;&lt;strong&gt;Inefficient Route Planning&lt;/strong&gt; Routes were planned manually, often based on driver experience rather than data. This led to:&lt;/p&gt;&lt;ul&gt;&lt;li&gt;&lt;p&gt;Excessive mileage&lt;/p&gt;&lt;/li&gt;&lt;li&gt;&lt;p&gt;Higher fuel costs&lt;/p&gt;&lt;/li&gt;&lt;li&gt;&lt;p&gt;Unpredictable delivery times&lt;/p&gt;&lt;/li&gt;&lt;/ul&gt;&lt;/li&gt;&lt;li&gt;&lt;p&gt;&lt;strong&gt;A Paper-Based System&lt;/strong&gt; Every trip relied on paper trip sheets, delivery notes, and manual reconciliations. That meant:&lt;/p&gt;&lt;ul&gt;&lt;li&gt;&lt;p&gt;Hours of administrative work each week.&lt;/p&gt;&lt;/li&gt;&lt;li&gt;&lt;p&gt;Lost paperwork and inconsistent data capture.&lt;/p&gt;&lt;/li&gt;&lt;li&gt;&lt;p&gt;Limited ability to analyze delivery performance.&lt;/p&gt;&lt;/li&gt;&lt;/ul&gt;&lt;/li&gt;&lt;li&gt;&lt;p&gt;&lt;strong&gt;Limited Post-Delivery Insight&lt;/strong&gt; After deliveries, management could only review video recordings and GPS trails, which showed where vehicles went &ndash; but not why. There was no journey-level visibility, no real-time metrics, and no ability to connect performance data back to individual trips.&lt;/p&gt;&lt;/li&gt;&lt;li&gt;&lt;p&gt;&lt;strong&gt;Misuse of Company Vehicles&lt;/strong&gt; Without visibility between stops, some drivers occasionally used company vehicles for personal errands during routes &ndash; unnoticed until after the fact.&lt;/p&gt;&lt;/li&gt;&lt;/ol&gt;&lt;p&gt;In short, Park Avenue had visibility at the macro level &ndash; but not where it mattered most.&lt;/p&gt;&quot;,
                &quot;the_solution&quot;: &quot;&lt;p&gt;Logistic Journey partnered with Park Avenue Stationers as a beta testing client, working closely with their operations and delivery teams to implement a smarter, more transparent delivery management system.&lt;/p&gt;&lt;ol start=\&quot;1\&quot;&gt;&lt;li&gt;&lt;p&gt;&lt;strong&gt;Journey-Level Visibility&lt;/strong&gt;&lt;br&gt;We introduced journey-level statistics to measure estimated vs. actual distances, helping identify:&lt;/p&gt;&lt;ul&gt;&lt;li&gt;&lt;p&gt;Route deviations.&lt;/p&gt;&lt;/li&gt;&lt;li&gt;&lt;p&gt;Extra kilometers travelled.&lt;/p&gt;&lt;/li&gt;&lt;li&gt;&lt;p&gt;Fuel inefficiencies.&lt;/p&gt;&lt;/li&gt;&lt;/ul&gt;&lt;p&gt;This instantly created accountability and empowered managers to take proactive action.&lt;/p&gt;&lt;/li&gt;&lt;li&gt;&lt;p&gt;&lt;strong&gt;Intuitive Reporting &amp;amp; Analytics&lt;/strong&gt;&lt;br&gt;We built simple reporting tools to let managers and dispatchers review delivery performance by:&lt;/p&gt;&lt;ul&gt;&lt;li&gt;&lt;p&gt;Date range.&lt;/p&gt;&lt;/li&gt;&lt;li&gt;&lt;p&gt;Driver&lt;/p&gt;&lt;/li&gt;&lt;li&gt;&lt;p&gt;Route&lt;/p&gt;&lt;/li&gt;&lt;li&gt;&lt;p&gt;Customer cluster&lt;/p&gt;&lt;/li&gt;&lt;/ul&gt;&lt;p&gt;These insights turned what used to be &ldquo;gut&rdquo; feel into data-driven decision-making.&lt;/p&gt;&lt;/li&gt;&lt;li&gt;&lt;p&gt;&lt;strong&gt;Real-Time Communication&lt;/strong&gt;&lt;br&gt;Through the Logistic Journey mobile app, dispatchers and drivers could now communicate directly inside the platform &ndash; reducing reliance on WhatsApp messages and phone calls that previously scattered communication.&lt;/p&gt;&lt;p&gt;This single-channel approach:&lt;/p&gt;&lt;ul&gt;&lt;li&gt;&lt;p&gt;Improved delivery coordination.&lt;/p&gt;&lt;/li&gt;&lt;li&gt;&lt;p&gt;Created a permanent communication log for accountability.&lt;/p&gt;&lt;/li&gt;&lt;/ul&gt;&lt;/li&gt;&lt;/ol&gt;&quot;,
                &quot;the_result&quot;: &quot;&lt;p&gt;Although Park Avenue&amp;#039;s partnership is still in early adoption, the transformation has already begun to show real results.&lt;/p&gt;&lt;p&gt;○ &lt;strong&gt;Real-Time Vehicle Tracking&lt;/strong&gt;&lt;br&gt;For the first time, management can view each journey in detail &ndash; from departure to delivery completion.&lt;br&gt;Deviations and detours are flagged automatically, helping identify route inefficiencies and potential&lt;br&gt;misuse of company vehicles.&lt;/p&gt;&lt;p&gt;○ &lt;strong&gt;Enhanced Accountability&lt;/strong&gt;&lt;br&gt;Drivers now know that every kilometer and stop is tracked transparently. The result?&lt;br&gt;A noticeable shift in behavior and ownership of delivery performance.&lt;/p&gt;&lt;p&gt;○ &lt;strong&gt;Smarter Decisions Through Data&lt;/strong&gt;&lt;br&gt;Every trip adds to a growing pool of delivery data. Over time, this allows Park Avenue to analyze trends,&lt;br&gt;predict resource needs, and continuously refine route planning for maximum efficiency.&lt;/p&gt;&lt;p&gt;○ &lt;strong&gt;Communication Clarity&lt;/strong&gt;&lt;br&gt;The in-app messaging and notification system replaced scattered WhatsApp threads, streamlining&lt;br&gt;dispatch-driver collaboration.&lt;/p&gt;&lt;h3&gt;Obstacles Along the Way&lt;/h3&gt;&lt;p&gt;No digital transformation comes without growing pains.&lt;/p&gt;&lt;ol start=\&quot;1\&quot;&gt;&lt;li&gt;&lt;p&gt;&lt;strong&gt;Human Resistance&lt;/strong&gt; Some staff were initially hesitant to adopt the new platform, fearing that data visibility would expose inefficiencies. Our approach: transparency and empathy. We framed the system not as surveillance, but as a tool for success &ndash; one that helps everyone perform at their best.&lt;/p&gt;&lt;/li&gt;&lt;li&gt;&lt;p&gt;&lt;strong&gt;System Integration Gap&lt;/strong&gt; Park Avenue&amp;#039;s ordering and sales system isn&amp;#039;t yet integrated with Logistic Journey, requiring some manual data entry during the beta phase. However, our technical team is already mapping the integration pathway to automate this process in the next development sprint.&lt;/p&gt;&lt;/li&gt;&lt;/ol&gt;&lt;h3&gt;Early Results Snapshot&lt;/h3&gt;&lt;table&gt;&lt;tbody&gt;&lt;tr&gt;&lt;th rowspan=\&quot;1\&quot; colspan=\&quot;1\&quot;&gt;&lt;p&gt;Metric&lt;/p&gt;&lt;/th&gt;&lt;th rowspan=\&quot;1\&quot; colspan=\&quot;1\&quot;&gt;&lt;p&gt;Before&lt;/p&gt;&lt;/th&gt;&lt;th rowspan=\&quot;1\&quot; colspan=\&quot;1\&quot;&gt;&lt;p&gt;After (Beta Phase)&lt;/p&gt;&lt;/th&gt;&lt;th rowspan=\&quot;1\&quot; colspan=\&quot;1\&quot;&gt;&lt;p&gt;Change&lt;/p&gt;&lt;/th&gt;&lt;/tr&gt;&lt;tr&gt;&lt;td rowspan=\&quot;1\&quot; colspan=\&quot;1\&quot;&gt;&lt;p&gt;Route visibility&lt;/p&gt;&lt;/td&gt;&lt;td rowspan=\&quot;1\&quot; colspan=\&quot;1\&quot;&gt;&lt;p&gt;Limited (GPS)&lt;/p&gt;&lt;/td&gt;&lt;td rowspan=\&quot;1\&quot; colspan=\&quot;1\&quot;&gt;&lt;p&gt;Full journey-level tracking&lt;/p&gt;&lt;/td&gt;&lt;td rowspan=\&quot;1\&quot; colspan=\&quot;1\&quot;&gt;&lt;p&gt;⬆ Improved&lt;/p&gt;&lt;/td&gt;&lt;/tr&gt;&lt;tr&gt;&lt;td rowspan=\&quot;1\&quot; colspan=\&quot;1\&quot;&gt;&lt;p&gt;Communication&lt;/p&gt;&lt;/td&gt;&lt;td rowspan=\&quot;1\&quot; colspan=\&quot;1\&quot;&gt;&lt;p&gt;WhatsApp &amp;amp; calls&lt;/p&gt;&lt;/td&gt;&lt;td rowspan=\&quot;1\&quot; colspan=\&quot;1\&quot;&gt;&lt;p&gt;In-app real-time&lt;/p&gt;&lt;/td&gt;&lt;td rowspan=\&quot;1\&quot; colspan=\&quot;1\&quot;&gt;&lt;p&gt;⬆ Streamlined&lt;/p&gt;&lt;/td&gt;&lt;/tr&gt;&lt;tr&gt;&lt;td rowspan=\&quot;1\&quot; colspan=\&quot;1\&quot;&gt;&lt;p&gt;Distance variance&lt;/p&gt;&lt;/td&gt;&lt;td rowspan=\&quot;1\&quot; colspan=\&quot;1\&quot;&gt;&lt;p&gt;Untracked&lt;/p&gt;&lt;/td&gt;&lt;td rowspan=\&quot;1\&quot; colspan=\&quot;1\&quot;&gt;&lt;p&gt;Measured vs. estimated&lt;/p&gt;&lt;/td&gt;&lt;td rowspan=\&quot;1\&quot; colspan=\&quot;1\&quot;&gt;&lt;p&gt;⬆ Transparent&lt;/p&gt;&lt;/td&gt;&lt;/tr&gt;&lt;tr&gt;&lt;td rowspan=\&quot;1\&quot; colspan=\&quot;1\&quot;&gt;&lt;p&gt;Driver accountability&lt;/p&gt;&lt;/td&gt;&lt;td rowspan=\&quot;1\&quot; colspan=\&quot;1\&quot;&gt;&lt;p&gt;Low&lt;/p&gt;&lt;/td&gt;&lt;td rowspan=\&quot;1\&quot; colspan=\&quot;1\&quot;&gt;&lt;p&gt;High (visible metrics)&lt;/p&gt;&lt;/td&gt;&lt;td rowspan=\&quot;1\&quot; colspan=\&quot;1\&quot;&gt;&lt;p&gt;⬆ Positive shift&lt;/p&gt;&lt;/td&gt;&lt;/tr&gt;&lt;tr&gt;&lt;td rowspan=\&quot;1\&quot; colspan=\&quot;1\&quot;&gt;&lt;p&gt;Data availability&lt;/p&gt;&lt;/td&gt;&lt;td rowspan=\&quot;1\&quot; colspan=\&quot;1\&quot;&gt;&lt;p&gt;Manual&lt;/p&gt;&lt;/td&gt;&lt;td rowspan=\&quot;1\&quot; colspan=\&quot;1\&quot;&gt;&lt;p&gt;Automated reports&lt;/p&gt;&lt;/td&gt;&lt;td rowspan=\&quot;1\&quot; colspan=\&quot;1\&quot;&gt;&lt;p&gt;⬆ Immediate access&lt;/p&gt;&lt;/td&gt;&lt;/tr&gt;&lt;/tbody&gt;&lt;/table&gt;&lt;h3&gt;Lessons Learned&lt;/h3&gt;&lt;ol start=\&quot;1\&quot;&gt;&lt;li&gt;&lt;p&gt;&lt;strong&gt;Visibility Creates Responsibility&lt;/strong&gt; Once drivers saw their journey data reflected in reports, they became more mindful about routes and time management.&lt;/p&gt;&lt;/li&gt;&lt;li&gt;&lt;p&gt;&lt;strong&gt;Simplicity Beats Complexity&lt;/strong&gt; The mobile app&amp;#039;s intuitive design meant even tech-resistant users could adopt it quickly.&lt;/p&gt;&lt;/li&gt;&lt;li&gt;&lt;p&gt;&lt;strong&gt;Data Needs Time to Mature&lt;/strong&gt; The longer the system runs, the more valuable the insights become &ndash; trends emerge, patterns surface, and strategic decisions get sharper.&lt;/p&gt;&lt;/li&gt;&lt;li&gt;&lt;p&gt;&lt;strong&gt;Digital Transformation is Emotional Before It&amp;#039;s Technical&lt;/strong&gt; The biggest challenge wasn&amp;#039;t the software &ndash; it was trust. Once the team saw that data empowers rather than punishes, adoption accelerated.&lt;/p&gt;&lt;/li&gt;&lt;/ol&gt;&quot;,
                &quot;the_road_ahead&quot;: &quot;&lt;p&gt;Park Avenue Stationers continues to use Logistic Journey as part of its ongoing digital transformation.&lt;br&gt;Next steps include:&lt;/p&gt;&lt;ul&gt;&lt;li&gt;&lt;p&gt;Integrating the ordering/sales platform for seamless workflows.&lt;/p&gt;&lt;/li&gt;&lt;li&gt;&lt;p&gt;Expanding analytics to include delivery cost-per-route.&lt;/p&gt;&lt;/li&gt;&lt;li&gt;&lt;p&gt;Creating a driver leaderboard to recognize high performers.&lt;/p&gt;&lt;/li&gt;&lt;/ul&gt;&lt;p&gt;As more data flows through the system, Park Avenue will be able to make decisions not on assumptions &ndash;&lt;br&gt;but on evidence, insight, and impact.&lt;/p&gt;&lt;h3&gt;Key Takeaway&lt;/h3&gt;&lt;p&gt;When logistics teams see the journey, they start to own the outcome.&lt;/p&gt;&lt;p&gt;Logistic Journey&amp;#039;s partnership with Park Avenue Stationers shows that visibility isn&amp;#039;t just about control &ndash;&lt;br&gt;it&amp;#039;s about trust, accountability, and progress.&lt;/p&gt;&lt;p&gt;Early wins in efficiency and communication are already reshaping how Park Avenue delivers.&lt;br&gt;And as their digital maturity grows, so too will their competitive advantage.&lt;/p&gt;&lt;blockquote&gt;&lt;p&gt;&lt;strong&gt;PARK AVENUE STATIONERS&lt;/strong&gt;&lt;br&gt;&lt;em&gt;Your Office Supplies Specialists&lt;/em&gt;&lt;/p&gt;&lt;p&gt;&amp;quot;It&amp;#039;s early days, but the difference is already clear. We can finally see what&amp;#039;s really happening&lt;br&gt;on the road &ndash; and that visibility changes everything.&amp;quot;&lt;/p&gt;&lt;/blockquote&gt;&lt;p&gt;&lt;strong&gt;Devon Miles&lt;/strong&gt;&lt;br&gt;&lt;em&gt;Operations Manager, Park Avenue Stationers&lt;/em&gt;&lt;/p&gt;&lt;p&gt;Digital transformation isn&amp;#039;t about replacing people with software &ndash; it&amp;#039;s about empowering teams&lt;br&gt;with clarity. Park Avenue Stationers&amp;#039; story shows what happens when logistics stops being guesswork&lt;br&gt;and starts being guided by insight.&lt;/p&gt;&lt;p&gt;&lt;strong&gt;Making Every Journey Count&lt;/strong&gt;&lt;br&gt;&lt;em&gt;With Logistic Journey&lt;/em&gt;&lt;/p&gt;&quot;
            },
            &quot;sidebar&quot;: {
                &quot;industry&quot;: &quot;Office Supplies &amp; Distributions&quot;,
                &quot;location&quot;: &quot;South Africa&quot;,
                &quot;engagement_type&quot;: &quot;Beta Testing Product&quot;,
                &quot;implementation_period&quot;: &quot;3 - 4 weeks&quot;,
                &quot;solution&quot;: &quot;Logistic Journey delivery management platform&quot;,
                &quot;logo&quot;: &quot;http://cms.logisticjourney.com/storage/case-studies/logos/01KA98TBS1C4MN0JF9WCQWB58C.png&quot;
            },
            &quot;meta&quot;: {
                &quot;meta_title&quot;: null,
                &quot;meta_description&quot;: null,
                &quot;status&quot;: &quot;published&quot;,
                &quot;is_featured&quot;: true,
                &quot;published_at&quot;: null,
                &quot;created_at&quot;: &quot;2025-11-17T15:12:45+00:00&quot;,
                &quot;updated_at&quot;: &quot;2025-11-17T16:01:57+00:00&quot;
            }
        }
    ],
    &quot;links&quot;: {
        &quot;first&quot;: &quot;http://127.0.0.1:8000/api/v1/case-studies?page=1&quot;,
        &quot;last&quot;: &quot;http://127.0.0.1:8000/api/v1/case-studies?page=1&quot;,
        &quot;prev&quot;: null,
        &quot;next&quot;: null
    },
    &quot;meta&quot;: {
        &quot;current_page&quot;: 1,
        &quot;from&quot;: 1,
        &quot;last_page&quot;: 1,
        &quot;links&quot;: [
            {
                &quot;url&quot;: null,
                &quot;label&quot;: &quot;&amp;laquo; Previous&quot;,
                &quot;page&quot;: null,
                &quot;active&quot;: false
            },
            {
                &quot;url&quot;: &quot;http://127.0.0.1:8000/api/v1/case-studies?page=1&quot;,
                &quot;label&quot;: &quot;1&quot;,
                &quot;page&quot;: 1,
                &quot;active&quot;: true
            },
            {
                &quot;url&quot;: null,
                &quot;label&quot;: &quot;Next &amp;raquo;&quot;,
                &quot;page&quot;: null,
                &quot;active&quot;: false
            }
        ],
        &quot;path&quot;: &quot;http://127.0.0.1:8000/api/v1/case-studies&quot;,
        &quot;per_page&quot;: 16,
        &quot;to&quot;: 1,
        &quot;total&quot;: 1
    }
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v1-case-studies" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-case-studies"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-case-studies"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-v1-case-studies" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-case-studies">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-v1-case-studies" data-method="GET"
      data-path="api/v1/case-studies"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-case-studies', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-v1-case-studies"
                    onclick="tryItOut('GETapi-v1-case-studies');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-v1-case-studies"
                    onclick="cancelTryOut('GETapi-v1-case-studies');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-v1-case-studies"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/case-studies</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-v1-case-studies"
               value="Bearer {YOUR_AUTH_TOKEN}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_TOKEN}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-v1-case-studies"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-v1-case-studies"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>featured</code></b>&nbsp;&nbsp;
<small>boolean</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <label data-endpoint="GETapi-v1-case-studies" style="display: none">
            <input type="radio" name="featured"
                   value="1"
                   data-endpoint="GETapi-v1-case-studies"
                   data-component="query"             >
            <code>true</code>
        </label>
        <label data-endpoint="GETapi-v1-case-studies" style="display: none">
            <input type="radio" name="featured"
                   value="0"
                   data-endpoint="GETapi-v1-case-studies"
                   data-component="query"             >
            <code>false</code>
        </label>
    <br>
<p>Optional. If true, only featured case studies are returned. Example: <code>false</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>per_page</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="per_page"                data-endpoint="GETapi-v1-case-studies"
               value="16"
               data-component="query">
    <br>
<p>Optional. Number of results per page. Default: 15 Example: <code>16</code></p>
            </div>
                </form>

    <h3>Response</h3>
    <h4 class="fancy-heading-panel"><b>Response Fields</b></h4>
    <div style=" padding-left: 28px;  clear: unset;">
        <details>
            <summary style="padding-bottom: 10px;">
                <b style="line-height: 2;"><code>data</code></b>&nbsp;&nbsp;
<small>object</small>&nbsp;
 &nbsp;
 &nbsp;
<br>

            </summary>
                                                <div style="margin-left: 14px; clear: unset;">
                        <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
<br>
<p>The ID of the case study</p>
                    </div>
                                                                <div style="margin-left: 14px; clear: unset;">
                        <b style="line-height: 2;"><code>title</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
<br>
<p>The title</p>
                    </div>
                                                                <div style="margin-left: 14px; clear: unset;">
                        <b style="line-height: 2;"><code>slug</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
<br>
<p>The slug</p>
                    </div>
                                                                <div style="margin-left: 14px; clear: unset;">
                        <b style="line-height: 2;"><code>featured_image</code></b>&nbsp;&nbsp;
<small>string|null</small>&nbsp;
 &nbsp;
 &nbsp;
<br>
<p>Main image (raw value)</p>
                    </div>
                                                                <div style="margin-left: 14px; clear: unset;">
                        <b style="line-height: 2;"><code>client</code></b>&nbsp;&nbsp;
<small>object</small>&nbsp;
 &nbsp;
 &nbsp;
<br>
<p>Client info (raw logo)</p>
                    </div>
                                                                <div style="margin-left: 14px; clear: unset;">
                        <b style="line-height: 2;"><code>content</code></b>&nbsp;&nbsp;
<small>object</small>&nbsp;
 &nbsp;
 &nbsp;
<br>
<p>Main content sections (includes banner)</p>
                    </div>
                                                                <div style="margin-left: 14px; clear: unset;">
                        <b style="line-height: 2;"><code>sidebar</code></b>&nbsp;&nbsp;
<small>object</small>&nbsp;
 &nbsp;
 &nbsp;
<br>
<p>Sidebar info (logo is URL)</p>
                    </div>
                                                                <div style="margin-left: 14px; clear: unset;">
                        <b style="line-height: 2;"><code>meta</code></b>&nbsp;&nbsp;
<small>object</small>&nbsp;
 &nbsp;
 &nbsp;
<br>
<p>Meta info</p>
                    </div>
                                    </details>
        </div>
                        <h2 id="case-studies-GETapi-v1-case-studies-featured">Get the latest featured published case study</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETapi-v1-case-studies-featured">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "https://cms.logisticjourney.com/api/v1/case-studies/featured" \
    --header "Authorization: Bearer {YOUR_AUTH_TOKEN}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://cms.logisticjourney.com/api/v1/case-studies/featured"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_TOKEN}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-v1-case-studies-featured">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: {
        &quot;id&quot;: 1,
        &quot;title&quot;: &quot;How Logistic Journey Helped Turn Paper Chaos into Digital Clarity&quot;,
        &quot;slug&quot;: &quot;how-logistic-journey-helped-turn-paper-chaos-into-digital-clarity&quot;,
        &quot;featured_image&quot;: &quot;case-studies/featured-images/01KA98TBSPSSHKKG3JD079BMCK.jpg&quot;,
        &quot;client&quot;: {
            &quot;name&quot;: &quot;Park Avenue Stationers&quot;,
            &quot;logo&quot;: &quot;http://cms.logisticjourney.com/storage/case-studies/logos/01KA98TBS1C4MN0JF9WCQWB58C.png&quot;,
            &quot;quote&quot;: &quot;&ldquo;It&rsquo;s early days, but the difference is already clear. We can finally see what&rsquo;s really happening on the road &mdash; and that visibility changes everything.&rdquo;&quot;,
            &quot;quote_author&quot;: &quot;Devon Miles&quot;,
            &quot;quote_author_title&quot;: &quot;Operations Manager, Park Avenue Stationers&quot;
        },
        &quot;content&quot;: {
            &quot;banner&quot;: &quot;http://cms.logisticjourney.com/storage/case-studies/featured-images/01KA98TBSPSSHKKG3JD079BMCK.jpg&quot;,
            &quot;introduction&quot;: &quot;&lt;p&gt;Park Avenue Stationers is a long-established distributor of office supplies, serving schools, corporates, and small businesses across South Africa. With a busy fleet of delivery vehicles, their challenge wasn&rsquo;t about getting goods out the door &mdash; it was about how they got there.&lt;/p&gt;&lt;p&gt;Before partnering with Logistic Journey, inefficiencies in route planning and delivery tracking were costing them precious time, fuel, and customer satisfaction.&lt;/p&gt;&quot;,
            &quot;the_problem&quot;: &quot;&lt;p&gt;Park Avenue Stationers&rsquo; delivery process had evolved over time &ndash; but not necessarily forward.&lt;/p&gt;&lt;ol start=\&quot;1\&quot;&gt;&lt;li&gt;&lt;p&gt;&lt;strong&gt;Inefficient Route Planning&lt;/strong&gt; Routes were planned manually, often based on driver experience rather than data. This led to:&lt;/p&gt;&lt;ul&gt;&lt;li&gt;&lt;p&gt;Excessive mileage&lt;/p&gt;&lt;/li&gt;&lt;li&gt;&lt;p&gt;Higher fuel costs&lt;/p&gt;&lt;/li&gt;&lt;li&gt;&lt;p&gt;Unpredictable delivery times&lt;/p&gt;&lt;/li&gt;&lt;/ul&gt;&lt;/li&gt;&lt;li&gt;&lt;p&gt;&lt;strong&gt;A Paper-Based System&lt;/strong&gt; Every trip relied on paper trip sheets, delivery notes, and manual reconciliations. That meant:&lt;/p&gt;&lt;ul&gt;&lt;li&gt;&lt;p&gt;Hours of administrative work each week.&lt;/p&gt;&lt;/li&gt;&lt;li&gt;&lt;p&gt;Lost paperwork and inconsistent data capture.&lt;/p&gt;&lt;/li&gt;&lt;li&gt;&lt;p&gt;Limited ability to analyze delivery performance.&lt;/p&gt;&lt;/li&gt;&lt;/ul&gt;&lt;/li&gt;&lt;li&gt;&lt;p&gt;&lt;strong&gt;Limited Post-Delivery Insight&lt;/strong&gt; After deliveries, management could only review video recordings and GPS trails, which showed where vehicles went &ndash; but not why. There was no journey-level visibility, no real-time metrics, and no ability to connect performance data back to individual trips.&lt;/p&gt;&lt;/li&gt;&lt;li&gt;&lt;p&gt;&lt;strong&gt;Misuse of Company Vehicles&lt;/strong&gt; Without visibility between stops, some drivers occasionally used company vehicles for personal errands during routes &ndash; unnoticed until after the fact.&lt;/p&gt;&lt;/li&gt;&lt;/ol&gt;&lt;p&gt;In short, Park Avenue had visibility at the macro level &ndash; but not where it mattered most.&lt;/p&gt;&quot;,
            &quot;the_solution&quot;: &quot;&lt;p&gt;Logistic Journey partnered with Park Avenue Stationers as a beta testing client, working closely with their operations and delivery teams to implement a smarter, more transparent delivery management system.&lt;/p&gt;&lt;ol start=\&quot;1\&quot;&gt;&lt;li&gt;&lt;p&gt;&lt;strong&gt;Journey-Level Visibility&lt;/strong&gt;&lt;br&gt;We introduced journey-level statistics to measure estimated vs. actual distances, helping identify:&lt;/p&gt;&lt;ul&gt;&lt;li&gt;&lt;p&gt;Route deviations.&lt;/p&gt;&lt;/li&gt;&lt;li&gt;&lt;p&gt;Extra kilometers travelled.&lt;/p&gt;&lt;/li&gt;&lt;li&gt;&lt;p&gt;Fuel inefficiencies.&lt;/p&gt;&lt;/li&gt;&lt;/ul&gt;&lt;p&gt;This instantly created accountability and empowered managers to take proactive action.&lt;/p&gt;&lt;/li&gt;&lt;li&gt;&lt;p&gt;&lt;strong&gt;Intuitive Reporting &amp;amp; Analytics&lt;/strong&gt;&lt;br&gt;We built simple reporting tools to let managers and dispatchers review delivery performance by:&lt;/p&gt;&lt;ul&gt;&lt;li&gt;&lt;p&gt;Date range.&lt;/p&gt;&lt;/li&gt;&lt;li&gt;&lt;p&gt;Driver&lt;/p&gt;&lt;/li&gt;&lt;li&gt;&lt;p&gt;Route&lt;/p&gt;&lt;/li&gt;&lt;li&gt;&lt;p&gt;Customer cluster&lt;/p&gt;&lt;/li&gt;&lt;/ul&gt;&lt;p&gt;These insights turned what used to be &ldquo;gut&rdquo; feel into data-driven decision-making.&lt;/p&gt;&lt;/li&gt;&lt;li&gt;&lt;p&gt;&lt;strong&gt;Real-Time Communication&lt;/strong&gt;&lt;br&gt;Through the Logistic Journey mobile app, dispatchers and drivers could now communicate directly inside the platform &ndash; reducing reliance on WhatsApp messages and phone calls that previously scattered communication.&lt;/p&gt;&lt;p&gt;This single-channel approach:&lt;/p&gt;&lt;ul&gt;&lt;li&gt;&lt;p&gt;Improved delivery coordination.&lt;/p&gt;&lt;/li&gt;&lt;li&gt;&lt;p&gt;Created a permanent communication log for accountability.&lt;/p&gt;&lt;/li&gt;&lt;/ul&gt;&lt;/li&gt;&lt;/ol&gt;&quot;,
            &quot;the_result&quot;: &quot;&lt;p&gt;Although Park Avenue&amp;#039;s partnership is still in early adoption, the transformation has already begun to show real results.&lt;/p&gt;&lt;p&gt;○ &lt;strong&gt;Real-Time Vehicle Tracking&lt;/strong&gt;&lt;br&gt;For the first time, management can view each journey in detail &ndash; from departure to delivery completion.&lt;br&gt;Deviations and detours are flagged automatically, helping identify route inefficiencies and potential&lt;br&gt;misuse of company vehicles.&lt;/p&gt;&lt;p&gt;○ &lt;strong&gt;Enhanced Accountability&lt;/strong&gt;&lt;br&gt;Drivers now know that every kilometer and stop is tracked transparently. The result?&lt;br&gt;A noticeable shift in behavior and ownership of delivery performance.&lt;/p&gt;&lt;p&gt;○ &lt;strong&gt;Smarter Decisions Through Data&lt;/strong&gt;&lt;br&gt;Every trip adds to a growing pool of delivery data. Over time, this allows Park Avenue to analyze trends,&lt;br&gt;predict resource needs, and continuously refine route planning for maximum efficiency.&lt;/p&gt;&lt;p&gt;○ &lt;strong&gt;Communication Clarity&lt;/strong&gt;&lt;br&gt;The in-app messaging and notification system replaced scattered WhatsApp threads, streamlining&lt;br&gt;dispatch-driver collaboration.&lt;/p&gt;&lt;h3&gt;Obstacles Along the Way&lt;/h3&gt;&lt;p&gt;No digital transformation comes without growing pains.&lt;/p&gt;&lt;ol start=\&quot;1\&quot;&gt;&lt;li&gt;&lt;p&gt;&lt;strong&gt;Human Resistance&lt;/strong&gt; Some staff were initially hesitant to adopt the new platform, fearing that data visibility would expose inefficiencies. Our approach: transparency and empathy. We framed the system not as surveillance, but as a tool for success &ndash; one that helps everyone perform at their best.&lt;/p&gt;&lt;/li&gt;&lt;li&gt;&lt;p&gt;&lt;strong&gt;System Integration Gap&lt;/strong&gt; Park Avenue&amp;#039;s ordering and sales system isn&amp;#039;t yet integrated with Logistic Journey, requiring some manual data entry during the beta phase. However, our technical team is already mapping the integration pathway to automate this process in the next development sprint.&lt;/p&gt;&lt;/li&gt;&lt;/ol&gt;&lt;h3&gt;Early Results Snapshot&lt;/h3&gt;&lt;table&gt;&lt;tbody&gt;&lt;tr&gt;&lt;th rowspan=\&quot;1\&quot; colspan=\&quot;1\&quot;&gt;&lt;p&gt;Metric&lt;/p&gt;&lt;/th&gt;&lt;th rowspan=\&quot;1\&quot; colspan=\&quot;1\&quot;&gt;&lt;p&gt;Before&lt;/p&gt;&lt;/th&gt;&lt;th rowspan=\&quot;1\&quot; colspan=\&quot;1\&quot;&gt;&lt;p&gt;After (Beta Phase)&lt;/p&gt;&lt;/th&gt;&lt;th rowspan=\&quot;1\&quot; colspan=\&quot;1\&quot;&gt;&lt;p&gt;Change&lt;/p&gt;&lt;/th&gt;&lt;/tr&gt;&lt;tr&gt;&lt;td rowspan=\&quot;1\&quot; colspan=\&quot;1\&quot;&gt;&lt;p&gt;Route visibility&lt;/p&gt;&lt;/td&gt;&lt;td rowspan=\&quot;1\&quot; colspan=\&quot;1\&quot;&gt;&lt;p&gt;Limited (GPS)&lt;/p&gt;&lt;/td&gt;&lt;td rowspan=\&quot;1\&quot; colspan=\&quot;1\&quot;&gt;&lt;p&gt;Full journey-level tracking&lt;/p&gt;&lt;/td&gt;&lt;td rowspan=\&quot;1\&quot; colspan=\&quot;1\&quot;&gt;&lt;p&gt;⬆ Improved&lt;/p&gt;&lt;/td&gt;&lt;/tr&gt;&lt;tr&gt;&lt;td rowspan=\&quot;1\&quot; colspan=\&quot;1\&quot;&gt;&lt;p&gt;Communication&lt;/p&gt;&lt;/td&gt;&lt;td rowspan=\&quot;1\&quot; colspan=\&quot;1\&quot;&gt;&lt;p&gt;WhatsApp &amp;amp; calls&lt;/p&gt;&lt;/td&gt;&lt;td rowspan=\&quot;1\&quot; colspan=\&quot;1\&quot;&gt;&lt;p&gt;In-app real-time&lt;/p&gt;&lt;/td&gt;&lt;td rowspan=\&quot;1\&quot; colspan=\&quot;1\&quot;&gt;&lt;p&gt;⬆ Streamlined&lt;/p&gt;&lt;/td&gt;&lt;/tr&gt;&lt;tr&gt;&lt;td rowspan=\&quot;1\&quot; colspan=\&quot;1\&quot;&gt;&lt;p&gt;Distance variance&lt;/p&gt;&lt;/td&gt;&lt;td rowspan=\&quot;1\&quot; colspan=\&quot;1\&quot;&gt;&lt;p&gt;Untracked&lt;/p&gt;&lt;/td&gt;&lt;td rowspan=\&quot;1\&quot; colspan=\&quot;1\&quot;&gt;&lt;p&gt;Measured vs. estimated&lt;/p&gt;&lt;/td&gt;&lt;td rowspan=\&quot;1\&quot; colspan=\&quot;1\&quot;&gt;&lt;p&gt;⬆ Transparent&lt;/p&gt;&lt;/td&gt;&lt;/tr&gt;&lt;tr&gt;&lt;td rowspan=\&quot;1\&quot; colspan=\&quot;1\&quot;&gt;&lt;p&gt;Driver accountability&lt;/p&gt;&lt;/td&gt;&lt;td rowspan=\&quot;1\&quot; colspan=\&quot;1\&quot;&gt;&lt;p&gt;Low&lt;/p&gt;&lt;/td&gt;&lt;td rowspan=\&quot;1\&quot; colspan=\&quot;1\&quot;&gt;&lt;p&gt;High (visible metrics)&lt;/p&gt;&lt;/td&gt;&lt;td rowspan=\&quot;1\&quot; colspan=\&quot;1\&quot;&gt;&lt;p&gt;⬆ Positive shift&lt;/p&gt;&lt;/td&gt;&lt;/tr&gt;&lt;tr&gt;&lt;td rowspan=\&quot;1\&quot; colspan=\&quot;1\&quot;&gt;&lt;p&gt;Data availability&lt;/p&gt;&lt;/td&gt;&lt;td rowspan=\&quot;1\&quot; colspan=\&quot;1\&quot;&gt;&lt;p&gt;Manual&lt;/p&gt;&lt;/td&gt;&lt;td rowspan=\&quot;1\&quot; colspan=\&quot;1\&quot;&gt;&lt;p&gt;Automated reports&lt;/p&gt;&lt;/td&gt;&lt;td rowspan=\&quot;1\&quot; colspan=\&quot;1\&quot;&gt;&lt;p&gt;⬆ Immediate access&lt;/p&gt;&lt;/td&gt;&lt;/tr&gt;&lt;/tbody&gt;&lt;/table&gt;&lt;h3&gt;Lessons Learned&lt;/h3&gt;&lt;ol start=\&quot;1\&quot;&gt;&lt;li&gt;&lt;p&gt;&lt;strong&gt;Visibility Creates Responsibility&lt;/strong&gt; Once drivers saw their journey data reflected in reports, they became more mindful about routes and time management.&lt;/p&gt;&lt;/li&gt;&lt;li&gt;&lt;p&gt;&lt;strong&gt;Simplicity Beats Complexity&lt;/strong&gt; The mobile app&amp;#039;s intuitive design meant even tech-resistant users could adopt it quickly.&lt;/p&gt;&lt;/li&gt;&lt;li&gt;&lt;p&gt;&lt;strong&gt;Data Needs Time to Mature&lt;/strong&gt; The longer the system runs, the more valuable the insights become &ndash; trends emerge, patterns surface, and strategic decisions get sharper.&lt;/p&gt;&lt;/li&gt;&lt;li&gt;&lt;p&gt;&lt;strong&gt;Digital Transformation is Emotional Before It&amp;#039;s Technical&lt;/strong&gt; The biggest challenge wasn&amp;#039;t the software &ndash; it was trust. Once the team saw that data empowers rather than punishes, adoption accelerated.&lt;/p&gt;&lt;/li&gt;&lt;/ol&gt;&quot;,
            &quot;the_road_ahead&quot;: &quot;&lt;p&gt;Park Avenue Stationers continues to use Logistic Journey as part of its ongoing digital transformation.&lt;br&gt;Next steps include:&lt;/p&gt;&lt;ul&gt;&lt;li&gt;&lt;p&gt;Integrating the ordering/sales platform for seamless workflows.&lt;/p&gt;&lt;/li&gt;&lt;li&gt;&lt;p&gt;Expanding analytics to include delivery cost-per-route.&lt;/p&gt;&lt;/li&gt;&lt;li&gt;&lt;p&gt;Creating a driver leaderboard to recognize high performers.&lt;/p&gt;&lt;/li&gt;&lt;/ul&gt;&lt;p&gt;As more data flows through the system, Park Avenue will be able to make decisions not on assumptions &ndash;&lt;br&gt;but on evidence, insight, and impact.&lt;/p&gt;&lt;h3&gt;Key Takeaway&lt;/h3&gt;&lt;p&gt;When logistics teams see the journey, they start to own the outcome.&lt;/p&gt;&lt;p&gt;Logistic Journey&amp;#039;s partnership with Park Avenue Stationers shows that visibility isn&amp;#039;t just about control &ndash;&lt;br&gt;it&amp;#039;s about trust, accountability, and progress.&lt;/p&gt;&lt;p&gt;Early wins in efficiency and communication are already reshaping how Park Avenue delivers.&lt;br&gt;And as their digital maturity grows, so too will their competitive advantage.&lt;/p&gt;&lt;blockquote&gt;&lt;p&gt;&lt;strong&gt;PARK AVENUE STATIONERS&lt;/strong&gt;&lt;br&gt;&lt;em&gt;Your Office Supplies Specialists&lt;/em&gt;&lt;/p&gt;&lt;p&gt;&amp;quot;It&amp;#039;s early days, but the difference is already clear. We can finally see what&amp;#039;s really happening&lt;br&gt;on the road &ndash; and that visibility changes everything.&amp;quot;&lt;/p&gt;&lt;/blockquote&gt;&lt;p&gt;&lt;strong&gt;Devon Miles&lt;/strong&gt;&lt;br&gt;&lt;em&gt;Operations Manager, Park Avenue Stationers&lt;/em&gt;&lt;/p&gt;&lt;p&gt;Digital transformation isn&amp;#039;t about replacing people with software &ndash; it&amp;#039;s about empowering teams&lt;br&gt;with clarity. Park Avenue Stationers&amp;#039; story shows what happens when logistics stops being guesswork&lt;br&gt;and starts being guided by insight.&lt;/p&gt;&lt;p&gt;&lt;strong&gt;Making Every Journey Count&lt;/strong&gt;&lt;br&gt;&lt;em&gt;With Logistic Journey&lt;/em&gt;&lt;/p&gt;&quot;
        },
        &quot;sidebar&quot;: {
            &quot;industry&quot;: &quot;Office Supplies &amp; Distributions&quot;,
            &quot;location&quot;: &quot;South Africa&quot;,
            &quot;engagement_type&quot;: &quot;Beta Testing Product&quot;,
            &quot;implementation_period&quot;: &quot;3 - 4 weeks&quot;,
            &quot;solution&quot;: &quot;Logistic Journey delivery management platform&quot;,
            &quot;logo&quot;: &quot;http://cms.logisticjourney.com/storage/case-studies/logos/01KA98TBS1C4MN0JF9WCQWB58C.png&quot;
        },
        &quot;meta&quot;: {
            &quot;meta_title&quot;: null,
            &quot;meta_description&quot;: null,
            &quot;status&quot;: &quot;published&quot;,
            &quot;is_featured&quot;: true,
            &quot;published_at&quot;: null,
            &quot;created_at&quot;: &quot;2025-11-17T15:12:45+00:00&quot;,
            &quot;updated_at&quot;: &quot;2025-11-17T16:01:57+00:00&quot;
        }
    }
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v1-case-studies-featured" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-case-studies-featured"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-case-studies-featured"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-v1-case-studies-featured" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-case-studies-featured">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-v1-case-studies-featured" data-method="GET"
      data-path="api/v1/case-studies/featured"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-case-studies-featured', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-v1-case-studies-featured"
                    onclick="tryItOut('GETapi-v1-case-studies-featured');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-v1-case-studies-featured"
                    onclick="cancelTryOut('GETapi-v1-case-studies-featured');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-v1-case-studies-featured"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/case-studies/featured</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-v1-case-studies-featured"
               value="Bearer {YOUR_AUTH_TOKEN}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_TOKEN}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-v1-case-studies-featured"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-v1-case-studies-featured"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

    <h3>Response</h3>
    <h4 class="fancy-heading-panel"><b>Response Fields</b></h4>
    <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
<br>
<p>The ID of the case study</p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>title</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
<br>
<p>The title</p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>slug</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
<br>
<p>The slug</p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>featured_image</code></b>&nbsp;&nbsp;
<small>string|null</small>&nbsp;
 &nbsp;
 &nbsp;
<br>
<p>Main image URL</p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>client</code></b>&nbsp;&nbsp;
<small>object</small>&nbsp;
 &nbsp;
 &nbsp;
<br>
<p>Client info</p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>content</code></b>&nbsp;&nbsp;
<small>object</small>&nbsp;
 &nbsp;
 &nbsp;
<br>
<p>Main content sections</p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>sidebar</code></b>&nbsp;&nbsp;
<small>object</small>&nbsp;
 &nbsp;
 &nbsp;
<br>
<p>Sidebar info</p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>meta</code></b>&nbsp;&nbsp;
<small>object</small>&nbsp;
 &nbsp;
 &nbsp;
<br>
<p>Meta info</p>
        </div>
                        <h2 id="case-studies-GETapi-v1-case-studies--slug-">Show a single published case study by slug</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETapi-v1-case-studies--slug-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "https://cms.logisticjourney.com/api/v1/case-studies/architecto" \
    --header "Authorization: Bearer {YOUR_AUTH_TOKEN}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://cms.logisticjourney.com/api/v1/case-studies/architecto"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_TOKEN}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-v1-case-studies--slug-">
            <blockquote>
            <p>Example response (404):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;No query results for model [Modules\\Blog\\Models\\CaseStudy].&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v1-case-studies--slug-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-case-studies--slug-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-case-studies--slug-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-v1-case-studies--slug-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-case-studies--slug-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-v1-case-studies--slug-" data-method="GET"
      data-path="api/v1/case-studies/{slug}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-case-studies--slug-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-v1-case-studies--slug-"
                    onclick="tryItOut('GETapi-v1-case-studies--slug-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-v1-case-studies--slug-"
                    onclick="cancelTryOut('GETapi-v1-case-studies--slug-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-v1-case-studies--slug-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/case-studies/{slug}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-v1-case-studies--slug-"
               value="Bearer {YOUR_AUTH_TOKEN}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_TOKEN}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-v1-case-studies--slug-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-v1-case-studies--slug-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>slug</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="slug"                data-endpoint="GETapi-v1-case-studies--slug-"
               value="architecto"
               data-component="url">
    <br>
<p>The slug of the case study Example: <code>architecto</code></p>
            </div>
                    </form>

    <h3>Response</h3>
    <h4 class="fancy-heading-panel"><b>Response Fields</b></h4>
    <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
<br>
<p>The ID of the case study</p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>title</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
<br>
<p>The title</p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>slug</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
<br>
<p>The slug</p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>featured_image</code></b>&nbsp;&nbsp;
<small>string|null</small>&nbsp;
 &nbsp;
 &nbsp;
<br>
<p>Main image (raw value)</p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>client</code></b>&nbsp;&nbsp;
<small>object</small>&nbsp;
 &nbsp;
 &nbsp;
<br>
<p>Client info (raw logo)</p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>content</code></b>&nbsp;&nbsp;
<small>object</small>&nbsp;
 &nbsp;
 &nbsp;
<br>
<p>Main content sections (includes banner)</p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>sidebar</code></b>&nbsp;&nbsp;
<small>object</small>&nbsp;
 &nbsp;
 &nbsp;
<br>
<p>Sidebar info (logo is URL)</p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>meta</code></b>&nbsp;&nbsp;
<small>object</small>&nbsp;
 &nbsp;
 &nbsp;
<br>
<p>Meta info</p>
        </div>
                    <h1 id="endpoints">Endpoints</h1>

    

                                <h2 id="endpoints-GETapi-v1-blocks">Display a listing of the resource.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETapi-v1-blocks">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "https://cms.logisticjourney.com/api/v1/blocks" \
    --header "Authorization: Bearer {YOUR_AUTH_TOKEN}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://cms.logisticjourney.com/api/v1/blocks"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_TOKEN}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-v1-blocks">
            <blockquote>
            <p>Example response (500):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Server Error&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v1-blocks" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-blocks"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-blocks"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-v1-blocks" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-blocks">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-v1-blocks" data-method="GET"
      data-path="api/v1/blocks"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-blocks', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-v1-blocks"
                    onclick="tryItOut('GETapi-v1-blocks');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-v1-blocks"
                    onclick="cancelTryOut('GETapi-v1-blocks');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-v1-blocks"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/blocks</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-v1-blocks"
               value="Bearer {YOUR_AUTH_TOKEN}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_TOKEN}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-v1-blocks"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-v1-blocks"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-POSTapi-v1-blocks">Store a newly created resource in storage.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTapi-v1-blocks">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "https://cms.logisticjourney.com/api/v1/blocks" \
    --header "Authorization: Bearer {YOUR_AUTH_TOKEN}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://cms.logisticjourney.com/api/v1/blocks"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_TOKEN}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-v1-blocks">
</span>
<span id="execution-results-POSTapi-v1-blocks" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-v1-blocks"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-v1-blocks"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-v1-blocks" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-v1-blocks">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-v1-blocks" data-method="POST"
      data-path="api/v1/blocks"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-v1-blocks', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-v1-blocks"
                    onclick="tryItOut('POSTapi-v1-blocks');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-v1-blocks"
                    onclick="cancelTryOut('POSTapi-v1-blocks');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-v1-blocks"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/v1/blocks</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="POSTapi-v1-blocks"
               value="Bearer {YOUR_AUTH_TOKEN}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_TOKEN}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-v1-blocks"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-v1-blocks"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GETapi-v1-blocks--id-">Show the specified resource.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETapi-v1-blocks--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "https://cms.logisticjourney.com/api/v1/blocks/architecto" \
    --header "Authorization: Bearer {YOUR_AUTH_TOKEN}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://cms.logisticjourney.com/api/v1/blocks/architecto"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_TOKEN}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-v1-blocks--id-">
            <blockquote>
            <p>Example response (500):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Server Error&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v1-blocks--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-blocks--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-blocks--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-v1-blocks--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-blocks--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-v1-blocks--id-" data-method="GET"
      data-path="api/v1/blocks/{id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-blocks--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-v1-blocks--id-"
                    onclick="tryItOut('GETapi-v1-blocks--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-v1-blocks--id-"
                    onclick="cancelTryOut('GETapi-v1-blocks--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-v1-blocks--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/blocks/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-v1-blocks--id-"
               value="Bearer {YOUR_AUTH_TOKEN}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_TOKEN}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-v1-blocks--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-v1-blocks--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="id"                data-endpoint="GETapi-v1-blocks--id-"
               value="architecto"
               data-component="url">
    <br>
<p>The ID of the block. Example: <code>architecto</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-PUTapi-v1-blocks--id-">Update the specified resource in storage.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-PUTapi-v1-blocks--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
    "https://cms.logisticjourney.com/api/v1/blocks/architecto" \
    --header "Authorization: Bearer {YOUR_AUTH_TOKEN}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://cms.logisticjourney.com/api/v1/blocks/architecto"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_TOKEN}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "PUT",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-PUTapi-v1-blocks--id-">
</span>
<span id="execution-results-PUTapi-v1-blocks--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTapi-v1-blocks--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-v1-blocks--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PUTapi-v1-blocks--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-v1-blocks--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PUTapi-v1-blocks--id-" data-method="PUT"
      data-path="api/v1/blocks/{id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTapi-v1-blocks--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTapi-v1-blocks--id-"
                    onclick="tryItOut('PUTapi-v1-blocks--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTapi-v1-blocks--id-"
                    onclick="cancelTryOut('PUTapi-v1-blocks--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTapi-v1-blocks--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>api/v1/blocks/{id}</code></b>
        </p>
            <p>
            <small class="badge badge-purple">PATCH</small>
            <b><code>api/v1/blocks/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="PUTapi-v1-blocks--id-"
               value="Bearer {YOUR_AUTH_TOKEN}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_TOKEN}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PUTapi-v1-blocks--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="PUTapi-v1-blocks--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="id"                data-endpoint="PUTapi-v1-blocks--id-"
               value="architecto"
               data-component="url">
    <br>
<p>The ID of the block. Example: <code>architecto</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-DELETEapi-v1-blocks--id-">Remove the specified resource from storage.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-DELETEapi-v1-blocks--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "https://cms.logisticjourney.com/api/v1/blocks/architecto" \
    --header "Authorization: Bearer {YOUR_AUTH_TOKEN}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://cms.logisticjourney.com/api/v1/blocks/architecto"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_TOKEN}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-DELETEapi-v1-blocks--id-">
</span>
<span id="execution-results-DELETEapi-v1-blocks--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEapi-v1-blocks--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-v1-blocks--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-DELETEapi-v1-blocks--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-v1-blocks--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-DELETEapi-v1-blocks--id-" data-method="DELETE"
      data-path="api/v1/blocks/{id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEapi-v1-blocks--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEapi-v1-blocks--id-"
                    onclick="tryItOut('DELETEapi-v1-blocks--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEapi-v1-blocks--id-"
                    onclick="cancelTryOut('DELETEapi-v1-blocks--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEapi-v1-blocks--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>api/v1/blocks/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="DELETEapi-v1-blocks--id-"
               value="Bearer {YOUR_AUTH_TOKEN}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_TOKEN}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="DELETEapi-v1-blocks--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="DELETEapi-v1-blocks--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="id"                data-endpoint="DELETEapi-v1-blocks--id-"
               value="architecto"
               data-component="url">
    <br>
<p>The ID of the block. Example: <code>architecto</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-GETapi-v1-pricings">Display a listing of the resource.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETapi-v1-pricings">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "https://cms.logisticjourney.com/api/v1/pricings" \
    --header "Authorization: Bearer {YOUR_AUTH_TOKEN}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://cms.logisticjourney.com/api/v1/pricings"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_TOKEN}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-v1-pricings">
            <blockquote>
            <p>Example response (500):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Server Error&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v1-pricings" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-pricings"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-pricings"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-v1-pricings" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-pricings">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-v1-pricings" data-method="GET"
      data-path="api/v1/pricings"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-pricings', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-v1-pricings"
                    onclick="tryItOut('GETapi-v1-pricings');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-v1-pricings"
                    onclick="cancelTryOut('GETapi-v1-pricings');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-v1-pricings"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/pricings</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-v1-pricings"
               value="Bearer {YOUR_AUTH_TOKEN}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_TOKEN}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-v1-pricings"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-v1-pricings"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-POSTapi-v1-pricings">Store a newly created resource in storage.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTapi-v1-pricings">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "https://cms.logisticjourney.com/api/v1/pricings" \
    --header "Authorization: Bearer {YOUR_AUTH_TOKEN}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://cms.logisticjourney.com/api/v1/pricings"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_TOKEN}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-v1-pricings">
</span>
<span id="execution-results-POSTapi-v1-pricings" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-v1-pricings"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-v1-pricings"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-v1-pricings" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-v1-pricings">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-v1-pricings" data-method="POST"
      data-path="api/v1/pricings"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-v1-pricings', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-v1-pricings"
                    onclick="tryItOut('POSTapi-v1-pricings');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-v1-pricings"
                    onclick="cancelTryOut('POSTapi-v1-pricings');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-v1-pricings"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/v1/pricings</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="POSTapi-v1-pricings"
               value="Bearer {YOUR_AUTH_TOKEN}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_TOKEN}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-v1-pricings"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-v1-pricings"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GETapi-v1-pricings--pricing-">Show the specified resource.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETapi-v1-pricings--pricing-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "https://cms.logisticjourney.com/api/v1/pricings/architecto" \
    --header "Authorization: Bearer {YOUR_AUTH_TOKEN}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://cms.logisticjourney.com/api/v1/pricings/architecto"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_TOKEN}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-v1-pricings--pricing-">
            <blockquote>
            <p>Example response (500):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Server Error&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v1-pricings--pricing-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-pricings--pricing-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-pricings--pricing-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-v1-pricings--pricing-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-pricings--pricing-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-v1-pricings--pricing-" data-method="GET"
      data-path="api/v1/pricings/{pricing}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-pricings--pricing-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-v1-pricings--pricing-"
                    onclick="tryItOut('GETapi-v1-pricings--pricing-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-v1-pricings--pricing-"
                    onclick="cancelTryOut('GETapi-v1-pricings--pricing-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-v1-pricings--pricing-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/pricings/{pricing}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-v1-pricings--pricing-"
               value="Bearer {YOUR_AUTH_TOKEN}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_TOKEN}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-v1-pricings--pricing-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-v1-pricings--pricing-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>pricing</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="pricing"                data-endpoint="GETapi-v1-pricings--pricing-"
               value="architecto"
               data-component="url">
    <br>
<p>The pricing. Example: <code>architecto</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-PUTapi-v1-pricings--pricing-">Update the specified resource in storage.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-PUTapi-v1-pricings--pricing-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
    "https://cms.logisticjourney.com/api/v1/pricings/architecto" \
    --header "Authorization: Bearer {YOUR_AUTH_TOKEN}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://cms.logisticjourney.com/api/v1/pricings/architecto"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_TOKEN}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "PUT",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-PUTapi-v1-pricings--pricing-">
</span>
<span id="execution-results-PUTapi-v1-pricings--pricing-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTapi-v1-pricings--pricing-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-v1-pricings--pricing-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PUTapi-v1-pricings--pricing-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-v1-pricings--pricing-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PUTapi-v1-pricings--pricing-" data-method="PUT"
      data-path="api/v1/pricings/{pricing}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTapi-v1-pricings--pricing-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTapi-v1-pricings--pricing-"
                    onclick="tryItOut('PUTapi-v1-pricings--pricing-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTapi-v1-pricings--pricing-"
                    onclick="cancelTryOut('PUTapi-v1-pricings--pricing-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTapi-v1-pricings--pricing-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>api/v1/pricings/{pricing}</code></b>
        </p>
            <p>
            <small class="badge badge-purple">PATCH</small>
            <b><code>api/v1/pricings/{pricing}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="PUTapi-v1-pricings--pricing-"
               value="Bearer {YOUR_AUTH_TOKEN}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_TOKEN}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PUTapi-v1-pricings--pricing-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="PUTapi-v1-pricings--pricing-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>pricing</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="pricing"                data-endpoint="PUTapi-v1-pricings--pricing-"
               value="architecto"
               data-component="url">
    <br>
<p>The pricing. Example: <code>architecto</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-DELETEapi-v1-pricings--pricing-">Remove the specified resource from storage.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-DELETEapi-v1-pricings--pricing-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "https://cms.logisticjourney.com/api/v1/pricings/architecto" \
    --header "Authorization: Bearer {YOUR_AUTH_TOKEN}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://cms.logisticjourney.com/api/v1/pricings/architecto"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_TOKEN}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-DELETEapi-v1-pricings--pricing-">
</span>
<span id="execution-results-DELETEapi-v1-pricings--pricing-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEapi-v1-pricings--pricing-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-v1-pricings--pricing-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-DELETEapi-v1-pricings--pricing-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-v1-pricings--pricing-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-DELETEapi-v1-pricings--pricing-" data-method="DELETE"
      data-path="api/v1/pricings/{pricing}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEapi-v1-pricings--pricing-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEapi-v1-pricings--pricing-"
                    onclick="tryItOut('DELETEapi-v1-pricings--pricing-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEapi-v1-pricings--pricing-"
                    onclick="cancelTryOut('DELETEapi-v1-pricings--pricing-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEapi-v1-pricings--pricing-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>api/v1/pricings/{pricing}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="DELETEapi-v1-pricings--pricing-"
               value="Bearer {YOUR_AUTH_TOKEN}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_TOKEN}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="DELETEapi-v1-pricings--pricing-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="DELETEapi-v1-pricings--pricing-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>pricing</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="pricing"                data-endpoint="DELETEapi-v1-pricings--pricing-"
               value="architecto"
               data-component="url">
    <br>
<p>The pricing. Example: <code>architecto</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-GETapi-v1-pages-type--type-">Get page by type (e.g., &#039;home&#039;, &#039;about&#039;, &#039;contact&#039;).</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>This is a convenience endpoint for frontend to fetch specific page types.</p>

<span id="example-requests-GETapi-v1-pages-type--type-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "https://cms.logisticjourney.com/api/v1/pages/type/architecto" \
    --header "Authorization: Bearer {YOUR_AUTH_TOKEN}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://cms.logisticjourney.com/api/v1/pages/type/architecto"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_TOKEN}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-v1-pages-type--type-">
            <blockquote>
            <p>Example response (404):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;No query results for model [Modules\\Website\\Models\\Page].&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v1-pages-type--type-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-pages-type--type-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-pages-type--type-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-v1-pages-type--type-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-pages-type--type-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-v1-pages-type--type-" data-method="GET"
      data-path="api/v1/pages/type/{type}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-pages-type--type-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-v1-pages-type--type-"
                    onclick="tryItOut('GETapi-v1-pages-type--type-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-v1-pages-type--type-"
                    onclick="cancelTryOut('GETapi-v1-pages-type--type-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-v1-pages-type--type-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/pages/type/{type}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-v1-pages-type--type-"
               value="Bearer {YOUR_AUTH_TOKEN}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_TOKEN}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-v1-pages-type--type-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-v1-pages-type--type-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>type</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="type"                data-endpoint="GETapi-v1-pages-type--type-"
               value="architecto"
               data-component="url">
    <br>
<p>The type. Example: <code>architecto</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-GETapi-v1-websites">Display a listing of the resource.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETapi-v1-websites">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "https://cms.logisticjourney.com/api/v1/websites" \
    --header "Authorization: Bearer {YOUR_AUTH_TOKEN}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://cms.logisticjourney.com/api/v1/websites"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_TOKEN}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-v1-websites">
            <blockquote>
            <p>Example response (500):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Server Error&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v1-websites" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-websites"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-websites"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-v1-websites" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-websites">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-v1-websites" data-method="GET"
      data-path="api/v1/websites"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-websites', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-v1-websites"
                    onclick="tryItOut('GETapi-v1-websites');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-v1-websites"
                    onclick="cancelTryOut('GETapi-v1-websites');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-v1-websites"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/websites</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-v1-websites"
               value="Bearer {YOUR_AUTH_TOKEN}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_TOKEN}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-v1-websites"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-v1-websites"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-POSTapi-v1-websites">Store a newly created resource in storage.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTapi-v1-websites">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "https://cms.logisticjourney.com/api/v1/websites" \
    --header "Authorization: Bearer {YOUR_AUTH_TOKEN}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://cms.logisticjourney.com/api/v1/websites"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_TOKEN}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-v1-websites">
</span>
<span id="execution-results-POSTapi-v1-websites" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-v1-websites"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-v1-websites"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-v1-websites" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-v1-websites">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-v1-websites" data-method="POST"
      data-path="api/v1/websites"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-v1-websites', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-v1-websites"
                    onclick="tryItOut('POSTapi-v1-websites');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-v1-websites"
                    onclick="cancelTryOut('POSTapi-v1-websites');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-v1-websites"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/v1/websites</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="POSTapi-v1-websites"
               value="Bearer {YOUR_AUTH_TOKEN}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_TOKEN}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-v1-websites"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-v1-websites"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GETapi-v1-websites--website-">Show the specified resource.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETapi-v1-websites--website-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "https://cms.logisticjourney.com/api/v1/websites/architecto" \
    --header "Authorization: Bearer {YOUR_AUTH_TOKEN}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://cms.logisticjourney.com/api/v1/websites/architecto"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_TOKEN}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-v1-websites--website-">
            <blockquote>
            <p>Example response (500):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Server Error&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v1-websites--website-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-websites--website-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-websites--website-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-v1-websites--website-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-websites--website-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-v1-websites--website-" data-method="GET"
      data-path="api/v1/websites/{website}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-websites--website-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-v1-websites--website-"
                    onclick="tryItOut('GETapi-v1-websites--website-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-v1-websites--website-"
                    onclick="cancelTryOut('GETapi-v1-websites--website-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-v1-websites--website-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/websites/{website}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-v1-websites--website-"
               value="Bearer {YOUR_AUTH_TOKEN}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_TOKEN}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-v1-websites--website-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-v1-websites--website-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>website</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="website"                data-endpoint="GETapi-v1-websites--website-"
               value="architecto"
               data-component="url">
    <br>
<p>The website. Example: <code>architecto</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-PUTapi-v1-websites--website-">Update the specified resource in storage.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-PUTapi-v1-websites--website-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
    "https://cms.logisticjourney.com/api/v1/websites/architecto" \
    --header "Authorization: Bearer {YOUR_AUTH_TOKEN}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://cms.logisticjourney.com/api/v1/websites/architecto"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_TOKEN}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "PUT",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-PUTapi-v1-websites--website-">
</span>
<span id="execution-results-PUTapi-v1-websites--website-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTapi-v1-websites--website-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-v1-websites--website-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PUTapi-v1-websites--website-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-v1-websites--website-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PUTapi-v1-websites--website-" data-method="PUT"
      data-path="api/v1/websites/{website}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTapi-v1-websites--website-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTapi-v1-websites--website-"
                    onclick="tryItOut('PUTapi-v1-websites--website-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTapi-v1-websites--website-"
                    onclick="cancelTryOut('PUTapi-v1-websites--website-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTapi-v1-websites--website-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>api/v1/websites/{website}</code></b>
        </p>
            <p>
            <small class="badge badge-purple">PATCH</small>
            <b><code>api/v1/websites/{website}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="PUTapi-v1-websites--website-"
               value="Bearer {YOUR_AUTH_TOKEN}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_TOKEN}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PUTapi-v1-websites--website-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="PUTapi-v1-websites--website-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>website</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="website"                data-endpoint="PUTapi-v1-websites--website-"
               value="architecto"
               data-component="url">
    <br>
<p>The website. Example: <code>architecto</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-DELETEapi-v1-websites--website-">Remove the specified resource from storage.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-DELETEapi-v1-websites--website-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "https://cms.logisticjourney.com/api/v1/websites/architecto" \
    --header "Authorization: Bearer {YOUR_AUTH_TOKEN}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://cms.logisticjourney.com/api/v1/websites/architecto"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_TOKEN}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-DELETEapi-v1-websites--website-">
</span>
<span id="execution-results-DELETEapi-v1-websites--website-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEapi-v1-websites--website-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-v1-websites--website-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-DELETEapi-v1-websites--website-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-v1-websites--website-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-DELETEapi-v1-websites--website-" data-method="DELETE"
      data-path="api/v1/websites/{website}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEapi-v1-websites--website-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEapi-v1-websites--website-"
                    onclick="tryItOut('DELETEapi-v1-websites--website-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEapi-v1-websites--website-"
                    onclick="cancelTryOut('DELETEapi-v1-websites--website-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEapi-v1-websites--website-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>api/v1/websites/{website}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="DELETEapi-v1-websites--website-"
               value="Bearer {YOUR_AUTH_TOKEN}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_TOKEN}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="DELETEapi-v1-websites--website-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="DELETEapi-v1-websites--website-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>website</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="website"                data-endpoint="DELETEapi-v1-websites--website-"
               value="architecto"
               data-component="url">
    <br>
<p>The website. Example: <code>architecto</code></p>
            </div>
                    </form>

                <h1 id="faqs">FAQs</h1>

    <p>APIs for managing frequently asked questions. Retrieve all FAQs or a specific FAQ by ID.</p>
<p>FAQs help users find answers to common questions about products and services.</p>

                                <h2 id="faqs-GETapi-v1-faqs">List all FAQs</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Retrieve a list of all FAQs sorted by most recently updated first.</p>

<span id="example-requests-GETapi-v1-faqs">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "https://cms.logisticjourney.com/api/v1/faqs" \
    --header "Authorization: Bearer {YOUR_AUTH_TOKEN}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://cms.logisticjourney.com/api/v1/faqs"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_TOKEN}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-v1-faqs">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: [
        {
            &quot;id&quot;: 1,
            &quot;question&quot;: &quot;What is your return policy?&quot;,
            &quot;answer&quot;: &quot;We offer 30-day returns on all products...&quot;,
            &quot;status&quot;: &quot;published&quot;,
            &quot;created_at&quot;: &quot;2025-11-10T10:30:00Z&quot;,
            &quot;updated_at&quot;: &quot;2025-11-11T15:45:00Z&quot;
        }
    ]
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v1-faqs" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-faqs"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-faqs"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-v1-faqs" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-faqs">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-v1-faqs" data-method="GET"
      data-path="api/v1/faqs"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-faqs', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-v1-faqs"
                    onclick="tryItOut('GETapi-v1-faqs');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-v1-faqs"
                    onclick="cancelTryOut('GETapi-v1-faqs');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-v1-faqs"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/faqs</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-v1-faqs"
               value="Bearer {YOUR_AUTH_TOKEN}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_TOKEN}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-v1-faqs"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-v1-faqs"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="faqs-GETapi-v1-faqs--id-">Get a specific FAQ</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Retrieve a single FAQ by its ID.</p>

<span id="example-requests-GETapi-v1-faqs--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "https://cms.logisticjourney.com/api/v1/faqs/1" \
    --header "Authorization: Bearer {YOUR_AUTH_TOKEN}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://cms.logisticjourney.com/api/v1/faqs/1"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_TOKEN}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-v1-faqs--id-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: {
        &quot;id&quot;: 1,
        &quot;question&quot;: &quot;What is your return policy?&quot;,
        &quot;answer&quot;: &quot;We offer 30-day returns on all products...&quot;,
        &quot;status&quot;: &quot;published&quot;,
        &quot;created_at&quot;: &quot;2025-11-10T10:30:00Z&quot;,
        &quot;updated_at&quot;: &quot;2025-11-11T15:45:00Z&quot;
    }
}</code>
 </pre>
            <blockquote>
            <p>Example response (404):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Not found&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v1-faqs--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-faqs--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-faqs--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-v1-faqs--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-faqs--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-v1-faqs--id-" data-method="GET"
      data-path="api/v1/faqs/{id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-faqs--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-v1-faqs--id-"
                    onclick="tryItOut('GETapi-v1-faqs--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-v1-faqs--id-"
                    onclick="cancelTryOut('GETapi-v1-faqs--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-v1-faqs--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/faqs/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-v1-faqs--id-"
               value="Bearer {YOUR_AUTH_TOKEN}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_TOKEN}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-v1-faqs--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-v1-faqs--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="GETapi-v1-faqs--id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the faq. Example: <code>1</code></p>
            </div>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>faq</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="faq"                data-endpoint="GETapi-v1-faqs--id-"
               value="1"
               data-component="url">
    <br>
<p>The FAQ ID. Example: <code>1</code></p>
            </div>
                    </form>

                <h1 id="form-submission">Form Submission</h1>

    

                                <h2 id="form-submission-POSTapi-v1-pages--identifier--submit">Submit a form with Google reCAPTCHA verification.

This endpoint allows the frontend to submit any form (contact, demo request, etc.) with dynamic fields and Google reCAPTCHA protection. The form is identified by its slug (e.g., `contact-us`).

**Frontend Integration Notes:**
- Obtain a reCAPTCHA token from the frontend using your site key (`RECAPTCHA_SITE_KEY` from .env).
- Send the token in the `captcha` field of the request body.
- All required fields for the form will be validated dynamically based on backend configuration.
- On success, a confirmation email is sent to the user (if email is provided and valid).
- On failure, you will receive detailed validation errors or a captcha error.

**Request:**
- Method: POST
- URL: `/api/forms/{identifier}/submit`
- Content-Type: `application/json`</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTapi-v1-pages--identifier--submit">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "https://cms.logisticjourney.com/api/v1/pages/architecto/submit" \
    --header "Authorization: Bearer {YOUR_AUTH_TOKEN}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"name\": \"John Doe\",
    \"email\": \"john@example.com\",
    \"phone\": \"+1 (555) 123-4567\",
    \"subject\": \"general\",
    \"message\": \"I\'d like more information about your services\",
    \"captcha\": \"03AGdBq25hcBhpXPC...\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://cms.logisticjourney.com/api/v1/pages/architecto/submit"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_TOKEN}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "John Doe",
    "email": "john@example.com",
    "phone": "+1 (555) 123-4567",
    "subject": "general",
    "message": "I'd like more information about your services",
    "captcha": "03AGdBq25hcBhpXPC..."
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-v1-pages--identifier--submit">
            <blockquote>
            <p>Example response (201, success):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;status&quot;: &quot;ok&quot;,
    &quot;id&quot;: 123,
    &quot;message&quot;: &quot;Submission received&quot;
}</code>
 </pre>
            <blockquote>
            <p>Example response (404, form_not_found):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Form not found&quot;
}</code>
 </pre>
            <blockquote>
            <p>Example response (422, validation_error):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
  &quot;message&quot;: &quot;Validation failed&quot;,
  &quot;errors&quot;: {
    &quot;email&quot;: [&quot;The email field is required&quot;],
    &quot;name&quot;: [&quot;The name field is required&quot;],
    &quot;message&quot;: [&quot;The message field is required&quot;]
  }dentifier. Example: contact-us
}</code>
 </pre>
            <blockquote>
            <p>Example response (422, captcha_failed):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;status&quot;: &quot;error&quot;,
    &quot;message&quot;: &quot;reCAPTCHA verification failed.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-v1-pages--identifier--submit" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-v1-pages--identifier--submit"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-v1-pages--identifier--submit"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-v1-pages--identifier--submit" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-v1-pages--identifier--submit">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-v1-pages--identifier--submit" data-method="POST"
      data-path="api/v1/pages/{identifier}/submit"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-v1-pages--identifier--submit', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-v1-pages--identifier--submit"
                    onclick="tryItOut('POSTapi-v1-pages--identifier--submit');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-v1-pages--identifier--submit"
                    onclick="cancelTryOut('POSTapi-v1-pages--identifier--submit');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-v1-pages--identifier--submit"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/v1/pages/{identifier}/submit</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="POSTapi-v1-pages--identifier--submit"
               value="Bearer {YOUR_AUTH_TOKEN}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_TOKEN}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-v1-pages--identifier--submit"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-v1-pages--identifier--submit"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>identifier</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="identifier"                data-endpoint="POSTapi-v1-pages--identifier--submit"
               value="architecto"
               data-component="url">
    <br>
<p>The form slug i Example: <code>architecto</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="name"                data-endpoint="POSTapi-v1-pages--identifier--submit"
               value="John Doe"
               data-component="body">
    <br>
<p>The submitter's full name. Example: <code>John Doe</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>email</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="email"                data-endpoint="POSTapi-v1-pages--identifier--submit"
               value="john@example.com"
               data-component="body">
    <br>
<p>Valid email address for contact and confirmation. Example: <code>john@example.com</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>phone</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="phone"                data-endpoint="POSTapi-v1-pages--identifier--submit"
               value="+1 (555) 123-4567"
               data-component="body">
    <br>
<p>Optional phone number. Example: <code>+1 (555) 123-4567</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>subject</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="subject"                data-endpoint="POSTapi-v1-pages--identifier--submit"
               value="general"
               data-component="body">
    <br>
<p>Optional subject or category. Example: <code>general</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>message</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="message"                data-endpoint="POSTapi-v1-pages--identifier--submit"
               value="I'd like more information about your services"
               data-component="body">
    <br>
<p>The message content. Example: <code>I'd like more information about your services</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>captcha</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="captcha"                data-endpoint="POSTapi-v1-pages--identifier--submit"
               value="03AGdBq25hcBhpXPC..."
               data-component="body">
    <br>
<p>Google reCAPTCHA token (v2 or v3) from frontend widget. Example: <code>03AGdBq25hcBhpXPC...</code></p>
        </div>
        </form>

                <h1 id="forms">Forms</h1>

    

                                <h2 id="forms-GETapi-v1-forms">List available forms with their fields and settings.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETapi-v1-forms">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "https://cms.logisticjourney.com/api/v1/forms?include_submissions=1&amp;active=1" \
    --header "Authorization: Bearer {YOUR_AUTH_TOKEN}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://cms.logisticjourney.com/api/v1/forms"
);

const params = {
    "include_submissions": "1",
    "active": "1",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_TOKEN}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-v1-forms">
            <blockquote>
            <p>Example response (200, success):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: [
        {
            &quot;id&quot;: 1,
            &quot;name&quot;: &quot;Demo Request&quot;,
            &quot;slug&quot;: &quot;demo-request&quot;,
            &quot;description&quot;: &quot;Request a demo of the product&quot;,
            &quot;active&quot;: true,
            &quot;fields&quot;: [
                {
                    &quot;name&quot;: &quot;name&quot;,
                    &quot;type&quot;: &quot;string&quot;,
                    &quot;label&quot;: &quot;Full Name&quot;,
                    &quot;placeholder&quot;: &quot;John Doe&quot;,
                    &quot;validation&quot;: [
                        &quot;required&quot;,
                        &quot;max:255&quot;
                    ]
                },
                {
                    &quot;name&quot;: &quot;email&quot;,
                    &quot;type&quot;: &quot;email&quot;,
                    &quot;label&quot;: &quot;Email Address&quot;,
                    &quot;validation&quot;: [
                        &quot;required&quot;,
                        &quot;email&quot;
                    ]
                }
            ],
            &quot;settings&quot;: {
                &quot;success_message&quot;: &quot;Thanks for your interest!&quot;,
                &quot;notification_email&quot;: &quot;sales@example.com&quot;
            }
        }
    ]
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v1-forms" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-forms"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-forms"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-v1-forms" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-forms">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-v1-forms" data-method="GET"
      data-path="api/v1/forms"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-forms', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-v1-forms"
                    onclick="tryItOut('GETapi-v1-forms');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-v1-forms"
                    onclick="cancelTryOut('GETapi-v1-forms');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-v1-forms"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/forms</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-v1-forms"
               value="Bearer {YOUR_AUTH_TOKEN}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_TOKEN}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-v1-forms"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-v1-forms"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>include_submissions</code></b>&nbsp;&nbsp;
<small>boolean</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <label data-endpoint="GETapi-v1-forms" style="display: none">
            <input type="radio" name="include_submissions"
                   value="1"
                   data-endpoint="GETapi-v1-forms"
                   data-component="query"             >
            <code>true</code>
        </label>
        <label data-endpoint="GETapi-v1-forms" style="display: none">
            <input type="radio" name="include_submissions"
                   value="0"
                   data-endpoint="GETapi-v1-forms"
                   data-component="query"             >
            <code>false</code>
        </label>
    <br>
<p>Include submission count in response. Example: <code>true</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>active</code></b>&nbsp;&nbsp;
<small>boolean</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <label data-endpoint="GETapi-v1-forms" style="display: none">
            <input type="radio" name="active"
                   value="1"
                   data-endpoint="GETapi-v1-forms"
                   data-component="query"             >
            <code>true</code>
        </label>
        <label data-endpoint="GETapi-v1-forms" style="display: none">
            <input type="radio" name="active"
                   value="0"
                   data-endpoint="GETapi-v1-forms"
                   data-component="query"             >
            <code>false</code>
        </label>
    <br>
<p>Filter by active/inactive forms. Example: <code>true</code></p>
            </div>
                </form>

                    <h2 id="forms-GETapi-v1-forms--identifier-">Get a single form by slug or id. Useful for frontend to render dynamic forms.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETapi-v1-forms--identifier-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "https://cms.logisticjourney.com/api/v1/forms/architecto" \
    --header "Authorization: Bearer {YOUR_AUTH_TOKEN}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://cms.logisticjourney.com/api/v1/forms/architecto"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_TOKEN}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-v1-forms--identifier-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: {
        &quot;id&quot;: 1,
        &quot;name&quot;: &quot;Demo Request&quot;,
        &quot;slug&quot;: &quot;demo-request&quot;,
        &quot;fields&quot;: [
            {
                &quot;name&quot;: &quot;name&quot;,
                &quot;type&quot;: &quot;string&quot;,
                &quot;label&quot;: &quot;Name&quot;,
                &quot;validation&quot;: [
                    &quot;required&quot;
                ]
            }
        ]
    }
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v1-forms--identifier-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-forms--identifier-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-forms--identifier-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-v1-forms--identifier-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-forms--identifier-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-v1-forms--identifier-" data-method="GET"
      data-path="api/v1/forms/{identifier}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-forms--identifier-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-v1-forms--identifier-"
                    onclick="tryItOut('GETapi-v1-forms--identifier-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-v1-forms--identifier-"
                    onclick="cancelTryOut('GETapi-v1-forms--identifier-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-v1-forms--identifier-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/forms/{identifier}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-v1-forms--identifier-"
               value="Bearer {YOUR_AUTH_TOKEN}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_TOKEN}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-v1-forms--identifier-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-v1-forms--identifier-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>identifier</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="identifier"                data-endpoint="GETapi-v1-forms--identifier-"
               value="architecto"
               data-component="url">
    <br>
<p>The form slug (e.g. <code>demo-request</code>) or id. Example: <code>architecto</code></p>
            </div>
                    </form>

                <h1 id="pages">Pages</h1>

    

                                <h2 id="pages-GETapi-v1-pages">Display a listing of pages.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETapi-v1-pages">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "https://cms.logisticjourney.com/api/v1/pages?type=about&amp;q=services&amp;include_hierarchy=1&amp;per_page=16" \
    --header "Authorization: Bearer {YOUR_AUTH_TOKEN}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://cms.logisticjourney.com/api/v1/pages"
);

const params = {
    "type": "about",
    "q": "services",
    "include_hierarchy": "1",
    "per_page": "16",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_TOKEN}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-v1-pages">
            <blockquote>
            <p>Example response (200, success):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: [
        {
            &quot;id&quot;: 1,
            &quot;title&quot;: &quot;About Us&quot;,
            &quot;slug&quot;: &quot;about&quot;,
            &quot;type&quot;: &quot;page&quot;,
            &quot;blocks&quot;: [
                {
                    &quot;type&quot;: &quot;hero&quot;,
                    &quot;title&quot;: &quot;Our Story&quot;,
                    &quot;content&quot;: &quot;Learn about our journey...&quot;
                }
            ],
            &quot;meta&quot;: {
                &quot;description&quot;: &quot;About our company&quot;,
                &quot;keywords&quot;: &quot;about,company,history&quot;
            }
        }
    ],
    &quot;meta&quot;: {
        &quot;current_page&quot;: 1,
        &quot;total&quot;: 10,
        &quot;per_page&quot;: 15
    }
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v1-pages" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-pages"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-pages"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-v1-pages" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-pages">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-v1-pages" data-method="GET"
      data-path="api/v1/pages"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-pages', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-v1-pages"
                    onclick="tryItOut('GETapi-v1-pages');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-v1-pages"
                    onclick="cancelTryOut('GETapi-v1-pages');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-v1-pages"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/pages</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-v1-pages"
               value="Bearer {YOUR_AUTH_TOKEN}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_TOKEN}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-v1-pages"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-v1-pages"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>type</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="type"                data-endpoint="GETapi-v1-pages"
               value="about"
               data-component="query">
    <br>
<p>Filter pages by type (e.g. 'home', 'about', 'contact'). Example: <code>about</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>q</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="q"                data-endpoint="GETapi-v1-pages"
               value="services"
               data-component="query">
    <br>
<p>Search in title, slug and content. Example: <code>services</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>include_hierarchy</code></b>&nbsp;&nbsp;
<small>boolean</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <label data-endpoint="GETapi-v1-pages" style="display: none">
            <input type="radio" name="include_hierarchy"
                   value="1"
                   data-endpoint="GETapi-v1-pages"
                   data-component="query"             >
            <code>true</code>
        </label>
        <label data-endpoint="GETapi-v1-pages" style="display: none">
            <input type="radio" name="include_hierarchy"
                   value="0"
                   data-endpoint="GETapi-v1-pages"
                   data-component="query"             >
            <code>false</code>
        </label>
    <br>
<p>Include parent and children relationships. Example: <code>true</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>per_page</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="per_page"                data-endpoint="GETapi-v1-pages"
               value="16"
               data-component="query">
    <br>
<p>Number of items per page. Default: 15 Example: <code>16</code></p>
            </div>
                </form>

                    <h2 id="pages-GETapi-v1-pages--identifier-">Show a single page by slug or ID.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETapi-v1-pages--identifier-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "https://cms.logisticjourney.com/api/v1/pages/about-us?include_hierarchy=1" \
    --header "Authorization: Bearer {YOUR_AUTH_TOKEN}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://cms.logisticjourney.com/api/v1/pages/about-us"
);

const params = {
    "include_hierarchy": "1",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_TOKEN}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-v1-pages--identifier-">
            <blockquote>
            <p>Example response (200, success):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: {
        &quot;id&quot;: 1,
        &quot;title&quot;: &quot;About Us&quot;,
        &quot;slug&quot;: &quot;about-us&quot;,
        &quot;type&quot;: &quot;page&quot;,
        &quot;status&quot;: &quot;published&quot;,
        &quot;blocks&quot;: [
            {
                &quot;type&quot;: &quot;hero&quot;,
                &quot;title&quot;: &quot;Our Story&quot;,
                &quot;content&quot;: &quot;Learn about our journey...&quot;
            },
            {
                &quot;type&quot;: &quot;contact-form&quot;,
                &quot;title&quot;: &quot;Get in Touch&quot;,
                &quot;form_slug&quot;: &quot;contact&quot;,
                &quot;submit_url&quot;: &quot;/api/v1/pages/contact/submit&quot;
            }
        ],
        &quot;meta&quot;: {
            &quot;description&quot;: &quot;About our company and mission&quot;,
            &quot;keywords&quot;: &quot;about,company,history&quot;
        },
        &quot;created_at&quot;: &quot;2023-01-01T00:00:00Z&quot;,
        &quot;updated_at&quot;: &quot;2023-01-01T00:00:00Z&quot;
    }
}</code>
 </pre>
            <blockquote>
            <p>Example response (404):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Page not found&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v1-pages--identifier-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-pages--identifier-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-pages--identifier-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-v1-pages--identifier-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-pages--identifier-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-v1-pages--identifier-" data-method="GET"
      data-path="api/v1/pages/{identifier}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-pages--identifier-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-v1-pages--identifier-"
                    onclick="tryItOut('GETapi-v1-pages--identifier-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-v1-pages--identifier-"
                    onclick="cancelTryOut('GETapi-v1-pages--identifier-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-v1-pages--identifier-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/pages/{identifier}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-v1-pages--identifier-"
               value="Bearer {YOUR_AUTH_TOKEN}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_TOKEN}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-v1-pages--identifier-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-v1-pages--identifier-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>identifier</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="identifier"                data-endpoint="GETapi-v1-pages--identifier-"
               value="about-us"
               data-component="url">
    <br>
<p>The page identifier - can be either a slug (e.g. 'about-us') or numeric ID. Example: <code>about-us</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>include_hierarchy</code></b>&nbsp;&nbsp;
<small>boolean</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <label data-endpoint="GETapi-v1-pages--identifier-" style="display: none">
            <input type="radio" name="include_hierarchy"
                   value="1"
                   data-endpoint="GETapi-v1-pages--identifier-"
                   data-component="query"             >
            <code>true</code>
        </label>
        <label data-endpoint="GETapi-v1-pages--identifier-" style="display: none">
            <input type="radio" name="include_hierarchy"
                   value="0"
                   data-endpoint="GETapi-v1-pages--identifier-"
                   data-component="query"             >
            <code>false</code>
        </label>
    <br>
<p>Include parent and children relationships. Example: <code>true</code></p>
            </div>
                </form>

                <h1 id="policies">Policies</h1>

    <p>APIs for managing public policies. Retrieve all policies or a specific policy by slug.</p>
<p>Policies are typically legal documents like terms of service or privacy policy.</p>

                                <h2 id="policies-GETapi-v1-policies">List all policies</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Retrieve a list of all published and draft policies.
Results are sorted by most recently updated first.</p>

<span id="example-requests-GETapi-v1-policies">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "https://cms.logisticjourney.com/api/v1/policies" \
    --header "Authorization: Bearer {YOUR_AUTH_TOKEN}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://cms.logisticjourney.com/api/v1/policies"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_TOKEN}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-v1-policies">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: [
        {
            &quot;id&quot;: 1,
            &quot;title&quot;: &quot;Privacy Policy&quot;,
            &quot;slug&quot;: &quot;privacy-policy&quot;,
            &quot;status&quot;: &quot;published&quot;,
            &quot;content&quot;: &quot;# Privacy Policy\n\nYour privacy is important to us...&quot;,
            &quot;meta_title&quot;: &quot;Privacy Policy&quot;,
            &quot;meta_description&quot;: &quot;Read our privacy policy&quot;,
            &quot;created_at&quot;: &quot;2025-11-10T10:30:00Z&quot;,
            &quot;updated_at&quot;: &quot;2025-11-11T15:45:00Z&quot;
        }
    ]
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v1-policies" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-policies"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-policies"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-v1-policies" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-policies">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-v1-policies" data-method="GET"
      data-path="api/v1/policies"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-policies', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-v1-policies"
                    onclick="tryItOut('GETapi-v1-policies');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-v1-policies"
                    onclick="cancelTryOut('GETapi-v1-policies');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-v1-policies"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/policies</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-v1-policies"
               value="Bearer {YOUR_AUTH_TOKEN}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_TOKEN}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-v1-policies"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-v1-policies"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="policies-GETapi-v1-policies--slug-">Get a policy by slug</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Retrieve a single policy using its URL-friendly slug.</p>

<span id="example-requests-GETapi-v1-policies--slug-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "https://cms.logisticjourney.com/api/v1/policies/architecto" \
    --header "Authorization: Bearer {YOUR_AUTH_TOKEN}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://cms.logisticjourney.com/api/v1/policies/architecto"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_TOKEN}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-v1-policies--slug-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: {
        &quot;id&quot;: 1,
        &quot;title&quot;: &quot;Privacy Policy&quot;,
        &quot;slug&quot;: &quot;privacy-policy&quot;,
        &quot;status&quot;: &quot;published&quot;,
        &quot;content&quot;: &quot;# Privacy Policy\n\nYour privacy is important to us...&quot;,
        &quot;meta_title&quot;: &quot;Privacy Policy&quot;,
        &quot;meta_description&quot;: &quot;Read our privacy policy&quot;,
        &quot;created_at&quot;: &quot;2025-11-10T10:30:00Z&quot;,
        &quot;updated_at&quot;: &quot;2025-11-11T15:45:00Z&quot;
    }
}</code>
 </pre>
            <blockquote>
            <p>Example response (404):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Not found&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v1-policies--slug-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-policies--slug-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-policies--slug-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-v1-policies--slug-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-policies--slug-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-v1-policies--slug-" data-method="GET"
      data-path="api/v1/policies/{slug}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-policies--slug-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-v1-policies--slug-"
                    onclick="tryItOut('GETapi-v1-policies--slug-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-v1-policies--slug-"
                    onclick="cancelTryOut('GETapi-v1-policies--slug-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-v1-policies--slug-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/policies/{slug}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-v1-policies--slug-"
               value="Bearer {YOUR_AUTH_TOKEN}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_TOKEN}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-v1-policies--slug-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-v1-policies--slug-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>slug</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="slug"                data-endpoint="GETapi-v1-policies--slug-"
               value="architecto"
               data-component="url">
    <br>
<p>The slug of the policy. Example: <code>architecto</code></p>
            </div>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>policy</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="policy"                data-endpoint="GETapi-v1-policies--slug-"
               value="privacy-policy"
               data-component="url">
    <br>
<p>The policy slug (e.g., &quot;privacy-policy&quot;). Example: <code>privacy-policy</code></p>
            </div>
                    </form>

            

        
    </div>
    <div class="dark-box">
                    <div class="lang-selector">
                                                        <button type="button" class="lang-button" data-language-name="bash">bash</button>
                                                        <button type="button" class="lang-button" data-language-name="javascript">javascript</button>
                            </div>
            </div>
</div>
</body>
</html>
