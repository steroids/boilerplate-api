<?php

return [
    'guest' => [
        'type' => 1,
        'children' => [
            'a::swagger',
            'a::api::init',
            'a::gii',
            'a::api::gii',
            'a::api::auth::login',
            'a::api::auth::recovery',
            'a::api::auth::recovery-confirm',
            'a::api::auth::registration',
            'a::api::auth::registration-confirm',
            'a::api::admin::auth::login',
        ],
    ],
    'user' => [
        'type' => 1,
        'children' => [
            'a::swagger',
            'a::api::init',
            'a::gii',
            'a::api::gii',
            'a::api::auth::logout',
            'a::api::auth::recovery',
            'a::api::auth::recovery-confirm',
        ],
    ],
    'admin' => [
        'type' => 1,
        'children' => [
            'a::swagger',
            'a::api::init',
            'a::api::admin',
            'a::gii',
            'a::api::gii',
            'a::api::auth::logout',
            'a::api::auth::recovery',
            'a::api::auth::recovery-confirm',
            'm::app\\user\\models\\User',
        ],
    ],
    'm::steroids\\auth\\models\\AuthConfirm' => [
        'type' => 2,
        'description' => 'steroids\\auth\\models\\AuthConfirm',
        'children' => [
            'm::steroids\\auth\\models\\AuthConfirm::view',
            'm::steroids\\auth\\models\\AuthConfirm::create',
            'm::steroids\\auth\\models\\AuthConfirm::update',
            'm::steroids\\auth\\models\\AuthConfirm::delete',
        ],
    ],
    'm::steroids\\auth\\models\\AuthConfirm::view' => [
        'type' => 2,
        'description' => 'view',
    ],
    'm::steroids\\auth\\models\\AuthConfirm::create' => [
        'type' => 2,
        'description' => 'create',
    ],
    'm::steroids\\auth\\models\\AuthConfirm::update' => [
        'type' => 2,
        'description' => 'update',
    ],
    'm::steroids\\auth\\models\\AuthConfirm::delete' => [
        'type' => 2,
        'description' => 'delete',
    ],
    'm::steroids\\auth\\models\\AuthLogin' => [
        'type' => 2,
        'description' => 'steroids\\auth\\models\\AuthLogin',
        'children' => [
            'm::steroids\\auth\\models\\AuthLogin::view',
            'm::steroids\\auth\\models\\AuthLogin::create',
            'm::steroids\\auth\\models\\AuthLogin::update',
            'm::steroids\\auth\\models\\AuthLogin::delete',
        ],
    ],
    'm::steroids\\auth\\models\\AuthLogin::view' => [
        'type' => 2,
        'description' => 'view',
    ],
    'm::steroids\\auth\\models\\AuthLogin::create' => [
        'type' => 2,
        'description' => 'create',
    ],
    'm::steroids\\auth\\models\\AuthLogin::update' => [
        'type' => 2,
        'description' => 'update',
    ],
    'm::steroids\\auth\\models\\AuthLogin::delete' => [
        'type' => 2,
        'description' => 'delete',
    ],
    'm::steroids\\auth\\models\\AuthSocial' => [
        'type' => 2,
        'description' => 'steroids\\auth\\models\\AuthSocial',
        'children' => [
            'm::steroids\\auth\\models\\AuthSocial::view',
            'm::steroids\\auth\\models\\AuthSocial::create',
            'm::steroids\\auth\\models\\AuthSocial::update',
            'm::steroids\\auth\\models\\AuthSocial::delete',
        ],
    ],
    'm::steroids\\auth\\models\\AuthSocial::view' => [
        'type' => 2,
        'description' => 'view',
    ],
    'm::steroids\\auth\\models\\AuthSocial::create' => [
        'type' => 2,
        'description' => 'create',
    ],
    'm::steroids\\auth\\models\\AuthSocial::update' => [
        'type' => 2,
        'description' => 'update',
    ],
    'm::steroids\\auth\\models\\AuthSocial::delete' => [
        'type' => 2,
        'description' => 'delete',
    ],
    'm::steroids\\auth\\models\\AuthTwoFactor' => [
        'type' => 2,
        'description' => 'steroids\\auth\\models\\AuthTwoFactor',
        'children' => [
            'm::steroids\\auth\\models\\AuthTwoFactor::view',
            'm::steroids\\auth\\models\\AuthTwoFactor::create',
            'm::steroids\\auth\\models\\AuthTwoFactor::update',
            'm::steroids\\auth\\models\\AuthTwoFactor::delete',
        ],
    ],
    'm::steroids\\auth\\models\\AuthTwoFactor::view' => [
        'type' => 2,
        'description' => 'view',
    ],
    'm::steroids\\auth\\models\\AuthTwoFactor::create' => [
        'type' => 2,
        'description' => 'create',
    ],
    'm::steroids\\auth\\models\\AuthTwoFactor::update' => [
        'type' => 2,
        'description' => 'update',
    ],
    'm::steroids\\auth\\models\\AuthTwoFactor::delete' => [
        'type' => 2,
        'description' => 'delete',
    ],
    'm::steroids\\notifier\\models\\Notification' => [
        'type' => 2,
        'description' => 'steroids\\notifier\\models\\Notification',
        'children' => [
            'm::steroids\\notifier\\models\\Notification::view',
            'm::steroids\\notifier\\models\\Notification::create',
            'm::steroids\\notifier\\models\\Notification::update',
            'm::steroids\\notifier\\models\\Notification::delete',
        ],
    ],
    'm::steroids\\notifier\\models\\Notification::view' => [
        'type' => 2,
        'description' => 'view',
    ],
    'm::steroids\\notifier\\models\\Notification::create' => [
        'type' => 2,
        'description' => 'create',
    ],
    'm::steroids\\notifier\\models\\Notification::update' => [
        'type' => 2,
        'description' => 'update',
    ],
    'm::steroids\\notifier\\models\\Notification::delete' => [
        'type' => 2,
        'description' => 'delete',
    ],
    'm::app\\user\\models\\User' => [
        'type' => 2,
        'description' => 'app\\user\\models\\User',
        'children' => [
            'm::app\\user\\models\\User::view',
            'm::app\\user\\models\\User::create',
            'm::app\\user\\models\\User::update',
            'm::app\\user\\models\\User::delete',
        ],
    ],
    'm::app\\user\\models\\User::view' => [
        'type' => 2,
        'description' => 'view',
    ],
    'm::app\\user\\models\\User::create' => [
        'type' => 2,
        'description' => 'create',
    ],
    'm::app\\user\\models\\User::update' => [
        'type' => 2,
        'description' => 'update',
    ],
    'm::app\\user\\models\\User::delete' => [
        'type' => 2,
        'description' => 'delete',
    ],
    'a::api' => [
        'type' => 2,
        'description' => 'api',
        'children' => [
            'a::api::self',
            'a::api::admin',
            'a::api::auth',
            'a::api::init',
            'a::api::gii',
            'a::api::notifier',
        ],
    ],
    'a::api::self' => [
        'type' => 2,
        'description' => 'self',
    ],
    'a::api::admin' => [
        'type' => 2,
        'description' => 'admin',
        'children' => [
            'a::api::admin::self',
            'a::api::admin::auth',
            'a::api::admin::user',
        ],
    ],
    'a::api::admin::self' => [
        'type' => 2,
        'description' => 'self',
    ],
    'a::api::admin::auth' => [
        'type' => 2,
        'description' => 'auth',
        'children' => [
            'a::api::admin::auth::self',
            'a::api::admin::auth::index',
            'a::api::admin::auth::create',
            'a::api::admin::auth::update-batch',
            'a::api::admin::auth::update',
            'a::api::admin::auth::view',
            'a::api::admin::auth::delete',
            'a::api::admin::auth::login',
            'a::api::admin::auth::logins',
            'a::api::admin::auth::logout',
            'a::api::admin::auth::logout-all',
            'a::api::admin::auth::confirm-send',
            'a::api::admin::auth::confirms',
            'a::api::admin::auth::confirm-accept',
            'a::api::admin::auth::ban',
            'a::api::admin::auth::password',
            'a::api::admin::auth::unban',
        ],
    ],
    'a::api::admin::auth::self' => [
        'type' => 2,
        'description' => 'self',
    ],
    'a::api::admin::auth::index' => [
        'type' => 2,
        'description' => 'index',
    ],
    'a::api::admin::auth::create' => [
        'type' => 2,
        'description' => 'create',
    ],
    'a::api::admin::auth::update-batch' => [
        'type' => 2,
        'description' => 'update-batch',
    ],
    'a::api::admin::auth::update' => [
        'type' => 2,
        'description' => 'update',
    ],
    'a::api::admin::auth::view' => [
        'type' => 2,
        'description' => 'view',
    ],
    'a::api::admin::auth::delete' => [
        'type' => 2,
        'description' => 'delete',
    ],
    'a::api::admin::auth::login' => [
        'type' => 2,
        'description' => 'login',
    ],
    'a::api::admin::auth::logins' => [
        'type' => 2,
        'description' => 'logins',
    ],
    'a::api::admin::auth::logout' => [
        'type' => 2,
        'description' => 'logout',
    ],
    'a::api::admin::auth::logout-all' => [
        'type' => 2,
        'description' => 'logout-all',
    ],
    'a::api::admin::auth::confirm-send' => [
        'type' => 2,
        'description' => 'confirm-send',
    ],
    'a::api::admin::auth::confirms' => [
        'type' => 2,
        'description' => 'confirms',
    ],
    'a::api::admin::auth::confirm-accept' => [
        'type' => 2,
        'description' => 'confirm-accept',
    ],
    'a::api::admin::auth::ban' => [
        'type' => 2,
        'description' => 'ban',
    ],
    'a::api::admin::auth::password' => [
        'type' => 2,
        'description' => 'password',
    ],
    'a::api::admin::user' => [
        'type' => 2,
        'description' => 'user',
        'children' => [
            'a::api::admin::user::self',
            'a::api::admin::user::users',
        ],
    ],
    'a::api::admin::user::self' => [
        'type' => 2,
        'description' => 'self',
    ],
    'a::api::admin::user::users' => [
        'type' => 2,
        'description' => 'users',
        'children' => [
            'a::api::admin::user::users::self',
            'a::api::admin::user::users::index',
            'a::api::admin::user::users::create',
            'a::api::admin::user::users::update-batch',
            'a::api::admin::user::users::update',
            'a::api::admin::user::users::view',
            'a::api::admin::user::users::delete',
            'a::api::admin::user::users::avatar',
        ],
    ],
    'a::api::admin::user::users::self' => [
        'type' => 2,
        'description' => 'self',
    ],
    'a::api::admin::user::users::index' => [
        'type' => 2,
        'description' => 'index',
    ],
    'a::api::admin::user::users::create' => [
        'type' => 2,
        'description' => 'create',
    ],
    'a::api::admin::user::users::update-batch' => [
        'type' => 2,
        'description' => 'update-batch',
    ],
    'a::api::admin::user::users::update' => [
        'type' => 2,
        'description' => 'update',
    ],
    'a::api::admin::user::users::view' => [
        'type' => 2,
        'description' => 'view',
    ],
    'a::api::admin::user::users::delete' => [
        'type' => 2,
        'description' => 'delete',
    ],
    'a::api::admin::user::users::avatar' => [
        'type' => 2,
        'description' => 'avatar',
    ],
    'a::api::auth' => [
        'type' => 2,
        'description' => 'auth',
        'children' => [
            'a::api::auth::self',
            'a::api::auth::registration',
            'a::api::auth::registration-confirm',
            'a::api::auth::login',
            'a::api::auth::recovery',
            'a::api::auth::recovery-confirm',
            'a::api::auth::confirm',
            'a::api::auth::resend-confirm',
            'a::api::auth::logout',
            'a::api::auth::two-factor-send',
            'a::api::auth::two-factor-confirm',
            'a::api::auth::ws',
        ],
    ],
    'a::api::auth::self' => [
        'type' => 2,
        'description' => 'self',
    ],
    'a::api::auth::registration' => [
        'type' => 2,
        'description' => 'registration',
    ],
    'a::api::auth::registration-confirm' => [
        'type' => 2,
        'description' => 'registration-confirm',
    ],
    'a::api::auth::login' => [
        'type' => 2,
        'description' => 'login',
    ],
    'a::api::auth::recovery' => [
        'type' => 2,
        'description' => 'recovery',
    ],
    'a::api::auth::recovery-confirm' => [
        'type' => 2,
        'description' => 'recovery-confirm',
    ],
    'a::api::auth::confirm' => [
        'type' => 2,
        'description' => 'confirm',
    ],
    'a::api::auth::resend-confirm' => [
        'type' => 2,
        'description' => 'resend-confirm',
    ],
    'a::api::auth::logout' => [
        'type' => 2,
        'description' => 'logout',
    ],
    'a::api::auth::two-factor-send' => [
        'type' => 2,
        'description' => 'two-factor-send',
    ],
    'a::api::auth::two-factor-confirm' => [
        'type' => 2,
        'description' => 'two-factor-confirm',
    ],
    'a::api::auth::ws' => [
        'type' => 2,
        'description' => 'ws',
    ],
    'a::api::init' => [
        'type' => 2,
        'description' => 'init',
    ],
    'a::api::gii' => [
        'type' => 2,
        'description' => 'gii',
        'children' => [
            'a::api::gii::self',
            'a::api::gii::init',
            'a::api::gii::entity',
            'a::api::gii::api-get-entities',
            'a::api::gii::api-class-save',
            'a::api::gii::api-get-permissions',
            'a::api::gii::api-permissions-save',
        ],
    ],
    'a::api::gii::self' => [
        'type' => 2,
        'description' => 'self',
    ],
    'a::api::gii::init' => [
        'type' => 2,
        'description' => 'init',
    ],
    'a::api::gii::entity' => [
        'type' => 2,
        'description' => 'entity',
    ],
    'a::api::gii::api-get-entities' => [
        'type' => 2,
        'description' => 'api-get-entities',
    ],
    'a::api::gii::api-class-save' => [
        'type' => 2,
        'description' => 'api-class-save',
    ],
    'a::api::gii::api-get-permissions' => [
        'type' => 2,
        'description' => 'api-get-permissions',
    ],
    'a::api::gii::api-permissions-save' => [
        'type' => 2,
        'description' => 'api-permissions-save',
    ],
    'a::api::notifier' => [
        'type' => 2,
        'description' => 'notifier',
        'children' => [
            'a::api::notifier::self',
            'a::api::notifier::mail-test',
            'a::api::notifier::notifications',
            'a::api::notifier::mark-read',
            'a::api::notifier::mark-read-all',
        ],
    ],
    'a::api::notifier::self' => [
        'type' => 2,
        'description' => 'self',
    ],
    'a::api::notifier::mail-test' => [
        'type' => 2,
        'description' => 'mail-test',
    ],
    'a::api::notifier::notifications' => [
        'type' => 2,
        'description' => 'notifications',
    ],
    'a::api::notifier::mark-read' => [
        'type' => 2,
        'description' => 'mark-read',
    ],
    'a::api::notifier::mark-read-all' => [
        'type' => 2,
        'description' => 'mark-read-all',
    ],
    'a::gii' => [
        'type' => 2,
        'description' => 'gii',
        'children' => [
            'a::gii::self',
            'a::gii::index',
        ],
    ],
    'a::gii::self' => [
        'type' => 2,
        'description' => 'self',
    ],
    'a::gii::index' => [
        'type' => 2,
        'description' => 'index',
    ],
    'a::swagger' => [
        'type' => 2,
        'description' => 'swagger',
        'children' => [
            'a::swagger::self',
            'a::swagger::json',
            'a::swagger::types',
        ],
    ],
    'a::swagger::self' => [
        'type' => 2,
        'description' => 'self',
    ],
    'a::swagger::json' => [
        'type' => 2,
        'description' => 'json',
    ],
    'a::swagger::types' => [
        'type' => 2,
        'description' => 'types',
    ],
    'a::api::admin::auth::unban' => [
        'type' => 2,
        'description' => 'unban',
    ],
];
