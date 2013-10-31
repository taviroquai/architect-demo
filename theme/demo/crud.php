<h1>CRUD UI Demo</h1>
<em>(Mainly a JS application)</em>

<h4>Users List</h4>
<div id="containerUserList"></div>
<div class="clearfix"></div>

<h4>Edit User</h4>
<div id="containerUserForm"></div>

<h4>User Groups</h4>
<div id="containerUserGroups"></div>

<script type="text/javascript">

    jQuery(function($)
    {
        CRUD.init();
        CRUD.addEvents();
    });
</script>