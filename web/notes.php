<?php

/*
 *
 * === DESIGN ===
 *
 * 1- Link controller <-> router
 *    mkdir controller + code class controller
 *
 * 2- ORM <-> controller/service
 *
 * 3- Authentication
 *
 *
 *
 *
 *
 *
 *
 * HTTP methods
 *
 * $app->get('/some/route/{id}', function () {
 *      // ....
 * });
 *
 *
 *  * $app->post('/some/route/{id}', function () {
 *      // ....
 * });
 *
 *  * $app->put('/some/route/{id}', function () {
 *      // ....
 * });
 *
 *  * $app->delete('/some/route/{id}', function () {
 *      // ....
 * });
 *
 *
 *
 * POST example
 *
 * $app->post('/post/form', function (Request $request) {
 *     $message = $request->get('message');
 *     mail('feedback@yoursite.com', '[YourSite] Feedback', $message);
 *
 *     return new Response('Thank you for your feedback!', 201);
 * });
 *
 *
 */