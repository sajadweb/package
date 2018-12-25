<?php
return [
    'prefix' => 'graphql',
    'domain' => null,
    'routes' => '{graphql_schema?}',
    'controllers' => \Folklore\GraphQL\GraphQLController::class . '@query',
    'variables_input_name' => 'variables',
    'middleware' => [],
    'middleware_schema' => [
        'default' => [],
        'client' => [],
        'user' => ['user.api'],
        'admin' => [],
    ],
    'headers' => [],
    'json_encoding_options' => 0,
    'graphiql' => [
        'routes' => '/graphiql/{graphql_schema?}',
        'controller' => \Folklore\GraphQL\GraphQLController::class . '@graphiql',
        'middleware' => [],
        'view' => 'graphql::graphiql',
        'composer' => \Folklore\GraphQL\View\GraphiQLComposer::class,
    ],
    'schema' => 'default',
    'schemas' => [
        'default' => [
            'query' => [
                'templates' => \App\Packages\Template\Query\TemplatesQuery::class,
                'template' => \App\Packages\Template\Query\TemplateQuery::class,
                'network_types' => \App\Packages\Network\Query\NetworkTypeQuery::class,
                'plans' => \App\Packages\Plan\Query\PlansQuery::class,
                'skills' => App\Packages\Skill\Query\SkillsQuery::class,
            ],
            'mutation' => [
                'UserSigninMutation' => \App\Packages\User\Mutation\UserSigninMutation::class,
                'ForgotPasswordMutation' => \App\Packages\User\Mutation\ForgotPasswordMutation::class,
                'UserSignupMutation' => \App\Packages\User\Mutation\UserSignupMutation::class,
                'VrifyUserMutation' => \App\Packages\User\Mutation\VrifyUserMutation::class,
                'AdminSignin' => \App\Packages\Admin\Mutation\AdminSignin::class

            ]
        ],
        'client' => [
            'query' => [
                'setting' => \App\Packages\Client\Query\TemplateQuery::class,
                'educationales' => \App\Packages\Client\Query\EducationalesQuery::class,
                'statistic' => \App\Packages\Client\Query\StatisticQuery::class,
                'court_cases' => \App\Packages\Client\Query\CourtCasesQuery::class,
                'about' => \App\Packages\Client\Query\AboutQuery::class,
                'networks' => \App\Packages\Client\Query\NetworksQuery::class,
                'photo' => \App\Packages\Client\Query\PhotoQuery::class,
                'skill' => \App\Packages\Client\Query\SkillQuery::class,
            ]
        ],
        'user' => [
            'query' => [
                'templates' => \App\Packages\Template\Query\TemplatesQuery::class,
                'network_types' => \App\Packages\Network\Query\NetworkTypeQuery::class,
                'plans' => \App\Packages\Plan\Query\PlansQuery::class,
                'skills' => App\Packages\Skill\Query\SkillsQuery::class,

                'splash' => \App\Packages\User\Query\SplashQuery::class,
                'networks' => \App\Packages\Network\Query\NetworkQuery::class,
                'user_skills' => \App\Packages\Skill\Query\UserSkillsQuery::class,
                'user_about' => \App\Packages\Template\Query\AboutTemplateQuery::class,
                'user_court_cases' => \App\Packages\Template\Query\CourtCasesQuery::class,
                'user_statistic' => \App\Packages\Template\Query\StatisticQuery::class,
                'user_resume' => \App\Packages\Template\Query\ResumeQuery::class,
                'user_educationales' => \App\Packages\Template\Query\EducationalesQuery::class,
                'user_photo' => \App\Packages\Photo\Query\UserPhotoQuery::class,
                'user_segment' => \App\Packages\Template\Query\SegmentQuery::class,
                'city' => \App\Packages\Location\Query\CityQuery::class
            ],
            'mutation' => [
                'delete_model' => \App\Packages\Template\Mutation\DeleteModelMutation::class,
                'choice_template' => \App\Packages\Template\Mutation\ChoiceTemplateMutation::class,
                'choice_domain' => \App\Packages\Template\Mutation\ChoiceDomainMutation::class,
                'network' => \App\Packages\Network\Mutation\AddNetworkMutation::class,
                'change_user_skill' => \App\Packages\Skill\Mutation\ChangeUserSkillMutation::class,
                'edit_about_template' => \App\Packages\Template\Mutation\EditAboutTemplateMutation::class,
                'change_court_cases' => \App\Packages\Template\Mutation\ChangeCourtCasesMutation::class,
                'change_statistic' => \App\Packages\Template\Mutation\ChangeStatisticMutation::class,
                'change_resume' => \App\Packages\Template\Mutation\ChangeResumeMutation::class,
                'change_educationales' => \App\Packages\Template\Mutation\ChangeEducationalesMutation::class,
                "change_user_segment" => \App\Packages\Template\Mutation\EditUserSegmentMutation::class,
            ]
        ],
        'admin' => [
            'query' => [
                'users' => \App\Packages\User\Query\UsersQuery::class,
                'admins' => \App\Packages\Admin\Query\AdminQuery::class,
                'templates' => \App\Packages\Template\Query\TemplatesQuery::class,
                'tickets' => \App\Packages\Ticket\Query\TicketQuery::class,
                'cities' => \App\Packages\Location\Query\CitiesQuery::class,
            ],
            'mutation' => [
                'AdminSignUp' => \App\Packages\Admin\Mutation\AdminSignUp::class,
                'AdminChange' => \App\Packages\Admin\Mutation\AdminChange::class,
                'UserSigninMutation' => \App\Packages\User\Mutation\UserSigninMutation::class,
                'UserSignupMutation' => \App\Packages\User\Mutation\UserSignupMutation::class,
                "add_plan" => \App\Packages\Plan\Mutation\AddPlanMutation::class,
                "edit_plan" => \App\Packages\Plan\Mutation\EditPlanMutation::class,
                "change_skill" => \App\Packages\Skill\Mutation\ChangeSkillMutation::class,

            ]
        ],

    ],
    'resolvers' => [
        'default' => [
        ],
    ],

    'defaultFieldResolver' => null,
    'types' => [
        'User' => \App\Packages\User\Type\UserType::class,
        'UserPagination' => \App\Packages\User\Type\UserPaginationType::class,
        'ResUser' => \App\Packages\User\Type\ResUserType::class,
        'Template' => App\Packages\Template\Type\TemplateType::class,
        'UserTemplate' => \App\Packages\Template\Type\UserTemplateType::class,
        'UserPlan' => \App\Packages\Plan\Type\UserPlanType::class,
        'Plan' => App\Packages\Plan\Type\PlanType::class,
        'Admin' => \App\Packages\Admin\Type\AdminType::class,
        'AdminPagination' => \App\Packages\Admin\Type\AdminPaginationType::class,
        'Ticket' => App\Packages\Ticket\Type\TicketType::class,
        'TicketType' => App\Packages\Ticket\Type\TicketTypeType::class,
        'TicketFile' => App\Packages\Ticket\Type\TicketFileType::class,
        'UserSetting' => \App\Packages\User\Type\UserSettingType::class,
        'Error' => \App\Packages\Tools\GraphQL\Type\ErrorType::class,
        'Splash' => \App\Packages\User\Type\SplashType::class,
        'NetworkType' => \App\Packages\Network\Type\NetworkTypeType::class,
        'Network' => \App\Packages\Network\Type\NetworkType::class,
        "Skill" => \App\Packages\Skill\Type\SkillType::class,
        "UserSkill" => \App\Packages\Skill\Type\UserSkillType::class,
        'AboutTemplate' => \App\Packages\Template\Type\AboutTemplateType::class,
        'CourtCases' => \App\Packages\Template\Type\CourtCasesType::class,
        'Statistic' => \App\Packages\Template\Type\StatisticType::class,
        'Resume' => \App\Packages\Template\Type\ResumeType::class,
        'Educationales' => \App\Packages\Template\Type\EducationalesType::class,
        'City' => \App\Packages\Location\Type\CityType::class,
        'CityWithPagination' => \App\Packages\Location\Type\CityWithPaginationType::class,
        'Photo' => \App\Packages\Photo\Type\PhotoType::class,
        'PhotoType' => \App\Packages\Photo\Type\PhotoTypeType::class,
        'Segment' => \App\Packages\Template\Type\SegmentType::class,
        'ClientTemplate' => \App\Packages\Template\Type\ClientTemplateType::class,


    ],
    'error_formatter' => [\Folklore\GraphQL\GraphQL::class, 'formatError'],
    'security' => [
        'query_max_complexity' => null,
        'query_max_depth' => null,
        'disable_introspection' => false
    ],

];
