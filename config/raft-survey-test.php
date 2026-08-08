<?php

/**
 * Test subset of the RAFT survey — 3 questions (1 per section) for fast testing.
 */
return [
    [
        'id' => 1,
        'type' => 'text',
        'category' => 'children',
        'section_id' => 'children',
        'section_title' => 'Children',
        'section_number' => 1,
        'total_sections' => 3,
        'label' => 'Child Main Challenges',
        'order' => 1,
        'question' => 'What are the main challenges your child is facing right now?',
        'transition_message' => 'Thank you for sharing about your child. Moving to parent experience.',
        'participant_behavior' => 'Needs suggestions/context',
        'ai_guidance' => 'This could be explored via context or themes.',
        'red_flag_criteria' => 'Flag if someone mentions safeguarding concerns, risk of harming self or others.',
    ],
    [
        'id' => 2,
        'type' => 'text',
        'category' => 'parents',
        'section_id' => 'parents',
        'section_title' => 'Parents & Carers',
        'section_number' => 2,
        'total_sections' => 3,
        'label' => 'Parent Main Challenges',
        'order' => 2,
        'question' => 'What are the main challenges you are facing right now, as a parent or carer?',
        'participant_behavior' => 'Struggling / Overwhelmed',
        'ai_guidance' => 'Ideas: parenting, financial burdens, health issues, feeling isolated or in burnout.',
        'red_flag_criteria' => 'Flag safeguarding concerns or overwhelm/burnout.',
    ],
    [
        'id' => 3,
        'type' => 'text',
        'category' => 'training',
        'section_id' => 'training',
        'section_title' => 'Training & Development',
        'section_number' => 3,
        'total_sections' => 3,
        'label' => 'Requested Training',
        'order' => 3,
        'question' => 'What training would you like the Raft to offer?',
        'participant_behavior' => 'Ideas requested',
        'ai_guidance' => 'Ideas: therapeutic parenting, trauma, attachment.',
        'red_flag_criteria' => 'Flag if user says they are overwhelmed and feel ill-equipped.',
    ],
];
