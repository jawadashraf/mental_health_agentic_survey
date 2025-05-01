<?php

return [
    [
        "id" => 1,
        "type" => "radio",
        "category" => "demographic",
        "label" => "Age Group",
        "order" => 1,
        "question" => "Which of the following age groups do you belong to?",
        "options" => [
            "15–24 years",
            "25–34 years",
            "35–44 years",
            "45–54 years",
            "55–64 years",
            "65–74 years",
            "75 years or older",
            "Prefer not to say"
        ]
    ],
    [
        "id" => 2,
        "type" => "radio",
        "category" => "demographic",
        "label" => "Gender",
        "order" => 2,
        "question" => "What is your gender?",
        "options" => [
            "Male",
            "Female",
            "Non-binary",
            "Prefer to self-describe: [__________]",
            "Prefer not to say"
        ]
    ],
    [
        "id" => 3,
        "type" => "radio",
        "category" => "demographic",
        "label" => "Marital or Civil Partnership Status",
        "order" => 3,
        "question" => "What is your current marital or civil partnership status?",
        "options" => [
            "Never married and never registered in a civil partnership",
            "Married",
            "In a registered civil partnership",
            "Separated, but still legally married",
            "Separated, but still legally in a civil partnership",
            "Divorced",
            "Formerly in a civil partnership now legally dissolved",
            "Widowed",
            "Surviving partner from a registered civil partnership",
            "Prefer not to say"
        ]
    ],
    [
        "id" => 4,
        "type" => "radio",
        "category" => "demographic",
        "label" => "Religion",
        "order" => 4,
        "question" => "What is your religion?",
        "options" => [
            "No religion",
            "Christian",
            "Buddhist",
            "Hindu",
            "Jewish",
            "Muslim",
            "Sikh",
            "Any other religion, please specify: [__________]",
            "Prefer not to say"
        ]
    ],
    [
        "id" => 5,
        "type" => "radio",
        "category" => "demographic",
        "label" => "Academic Qualification",
        "order" => 5,
        "question" => "What is your highest level of academic qualification?",
        "options" => [
            "No formal qualifications",
            "GCSEs or equivalent",
            "A Levels or equivalent",
            "Undergraduate degree",
            "Postgraduate degree and above",
            "Other, please specify: [__________]",
            "Prefer not to say"
        ]
    ]
];
