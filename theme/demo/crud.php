<h1>CRUD UI Demo</h1>
<em>(Mainly a JS application)</em>

<h4>Users List</h4>
<div id="containerUserList"></div>
<div class="clearfix"></div>

<h4>Edit User</h4>
<div id="containerUserForm"></div>

<h4>User Groups</h4>
<div id="containerUserGroups"></div>

<h4>PHP / JS</h4>
<pre>
c(BASE_URL.'theme/demo/demo.js', 'js');
c(new \Arch\View('theme/demo/crud.php'));
</pre>
<h4>Default Template</h4>
<pre>theme/demo/crud.php</pre>
<script type="text/javascript">

    jQuery(function($)
    {
        CRUD.init();
        CRUD.addEvents();
    });
</script>