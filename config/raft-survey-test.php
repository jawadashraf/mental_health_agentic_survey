<?php

/**
 * Test subset of the RAFT foster care survey — 3 questions for quick testing.
 * Covers radio + text types and includes a transition message to validate flow.
 */
return [
    [
        'id' => 1,
        'type' => 'text',
        'category' => 'current_support',
        'label' => 'Helpful Support Types',
        'order' => 1,
        'question' => 'What types of support are currently most helpful to your family?',
    ],
    [
        'id' => 2,
        'type' => 'radio',
        'category' => 'emotional_support',
        'label' => 'Trauma-Informed Services',
        'order' => 2,
        'question' => 'Are trauma-informed services accessible in your area?',
        'options' => ['Yes', 'No', 'Not sure'],
        'transition_message' => 'Thank you for sharing about your support experience. One last question ahead!',
    ],
    [
        'id' => 3,
        'type' => 'text',
        'category' => 'future_planning',
        'label' => 'New Support Service Design',
        'order' => 3,
        'question' => 'If you could design one new support service, what would it be?',
    ],
];
