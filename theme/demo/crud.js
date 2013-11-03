
/**
 * Demo CRUD interface namespace
 */
var CRUD = {
    current: 1,
    userform: null,
    userlist: null,
    usergroupslist: null,
    selectedGroups: []
};

/**
 * Run initialize when jQuery is ready
 */
CRUD.init = function () {
    
    CRUD.userform   = $('#containerUserForm');
    CRUD.userlist   = $('#containerUserList');
    CRUD.usergroupslist  = $('#containerUserGroups');
    
    CRUD.showUserList();
    CRUD.showUserGroupList();
    CRUD.showUserForm();
}

/**
 * Bind interface events
 */
CRUD.addEvents = function () {
    
    $(document).on('click', '#new', function(e) {
        e.preventDefault();
        e.stopPropagation();
        CRUD.current = 0;
        CRUD.showUserForm();
    });

    $(document).on('click', '#delete', function(e) {
        e.preventDefault();
        e.stopPropagation();
        CRUD.deleteUser();
    });

    $(document).on('click', '#containerUserList a', function(e) {
        e.preventDefault();
        e.stopPropagation();
        var params = $(e.target).attr('data-ui').split('/');
        CRUD.current = params[1];
        CRUD.showUserForm();
    });

    $(document).on('submit', '#containerUserForm', function(e) {
        e.preventDefault();
        var data = $(e.target).serialize();
        CRUD.saveUser(data);
    });
    
    $(document).on('click', '#containerUserGroups', function(e) {
        var data = [], group;
        $('#containerUserGroups button').each(function(i, item) {
            group = $(item);
            if (group.hasClass('active')) data.push(group.attr('data-id'));
        });
        CRUD.saveGroup(data);
    });
}

/**
 * Ajax comunications handler
 */
CRUD.ajax = function (url, data, cb) {
    if (data) $.post(url, data, cb);
    else $.get(url, cb);
}

CRUD.getEditUrl = function() {
    return Arch.url('/demo/crud/user/'+CRUD.current+'/edit');
}

CRUD.getUserListUrl = function () {
    return Arch.url('/demo/crud/user/list');
}

CRUD.getUserGroupsListUrl = function () {
    return Arch.url('/demo/crud/user/'+CRUD.current+'/group/list');
}

CRUD.getSaveGroupUrl = function () {
    return Arch.url('/demo/crud/user/save/group');
}

CRUD.getSaveUserUrl = function () {
    return Arch.url('/demo/crud/user/save');
}

CRUD.getDeleteUserUrl = function () {
    return Arch.url('/demo/crud/user/'+CRUD.current+'/delete');
}

CRUD.showUserForm = function () {
    CRUD.userform.load(CRUD.getEditUrl());
    CRUD.showUserGroupList();
}

CRUD.showUserList = function () {
    CRUD.userlist.load(CRUD.getUserListUrl());
}

CRUD.showUserGroupList = function () {
    CRUD.usergroupslist.load(CRUD.getUserGroupsListUrl());
}

CRUD.saveGroup = function (group_id) {
    var data = {id_user: CRUD.current, id_group: group_id};
    CRUD.ajax(CRUD.getSaveGroupUrl(), data);
}

CRUD.saveUser = function (data) {
    CRUD.ajax(CRUD.getSaveUserUrl (), data, function (json) {
        CRUD.current = json.id;
        CRUD.showUserForm();
        CRUD.showUserList();
        CRUD.showUserGroupList();
    });
}

CRUD.deleteUser = function () {
    CRUD.ajax(CRUD.getDeleteUserUrl (), function () {
        CRUD.current = 0;
        CRUD.showUserForm();
        CRUD.showUserList();
    });
}
