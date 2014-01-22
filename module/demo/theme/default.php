<!-- Main hero unit for a primary marketing message or call to action -->
<div class="hero-unit">
  <h1><?=$idiom->t('TITLE')?></h1>
  
  <h2>Quick Start</h2>
  <ol>
      <li>Create a new folder in <strong>module/hello</strong></li>
      <li>Create a new file in <strong>module/hello/config.php</strong></li>
      <li>Add the following content
          <pre>
&lt;?php

r('/hello', function() {
    $message = '&lt;h1&gt;Hello World!&lt;h1&gt;';
    c($message);
});
          </pre>
      </li>
      <li>Go to <a href="<?=u('/hello')?>">hello</a> page</li>
      <li>Also take a look at <a href="<?=u('/demo')?>">demo</a> page</li>
  </ol>
  
  <h2>Documentation</h2>
  The documentation is in development. Take a look in 
  <a href="https://github.com/taviroquai/architect" title="Architect">GitHub</a>.
  
  <h2>Credits</h2>
  <p>Twitter Boostrap, jQuery, Quicksand font by Andrew Paglinawan, 
      Thiago de Arruda Datetime Picker, Jasny FileUpload (Jasny), 
      Morris JS, Raphael JS, Google Maps, Leaflet JS, MindMup Wysiwyg,
      PHP Composer/Packagist and Architect PHP Framework</p>
</div>