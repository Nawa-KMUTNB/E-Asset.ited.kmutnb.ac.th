<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted' => 'The :attribute must be accepted.',
    'accepted_if' => 'The :attribute must be accepted when :other is :value.',
    'active_url' => 'The :attribute is not a valid URL.',
    'after' => 'The :attribute must be a date after :date.',
    'after_or_equal' => 'The :attribute must be a date after or equal to :date.',
    'alpha' => 'The :attribute must only contain letters.',
    'alpha_dash' => 'The :attribute must only contain letters, numbers, dashes and underscores.',
    'alpha_num' => 'The :attribute must only contain letters and numbers.',
    'array' => 'The :attribute must be an array.',
    'before' => 'The :attribute must be a date before :date.',
    'before_or_equal' => 'The :attribute must be a date before or equal to :date.',
    'between' => [
        'numeric' => 'The :attribute must be between :min and :max.',
        'file' => 'The :attribute must be between :min and :max kilobytes.',
        'string' => 'The :attribute must be between :min and :max characters.',
        'array' => 'The :attribute must have between :min and :max items.',
    ],
    'boolean' => 'The :attribute field must be true or false.',
    'confirmed' => 'The :attribute confirmation does not match.',
    'current_password' => 'The password is incorrect.',
    'date' => 'The :attribute is not a valid date.',
    'date_equals' => 'The :attribute must be a date equal to :date.',
    'date_format' => 'The :attribute does not match the format :format.',
    'declined' => 'The :attribute must be declined.',
    'declined_if' => 'The :attribute must be declined when :other is :value.',
    'different' => 'The :attribute and :other must be different.',
    'digits' => 'The :attribute must be :digits digits.',
    'digits_between' => 'The :attribute must be between :min and :max digits.',
    'dimensions' => 'The :attribute has invalid image dimensions.',
    'distinct' => 'The :attribute field has a duplicate value.',
    'email' => 'The :attribute must be a valid email address.',
    'ends_with' => 'The :attribute must end with one of the following: :values.',
    'enum' => 'The selected :attribute is invalid.',
    'exists' => 'The selected :attribute is invalid.',
    'file' => 'The :attribute must be a file.',
    'filled' => 'The :attribute field must have a value.',
    'gt' => [
        'numeric' => 'The :attribute must be greater than :value.',
        'file' => 'The :attribute must be greater than :value kilobytes.',
        'string' => 'The :attribute must be greater than :value characters.',
        'array' => 'The :attribute must have more than :value items.',
    ],
    'gte' => [
        'numeric' => 'The :attribute must be greater than or equal to :value.',
        'file' => 'The :attribute must be greater than or equal to :value kilobytes.',
        'string' => 'The :attribute must be greater than or equal to :value characters.',
        'array' => 'The :attribute must have :value items or more.',
    ],
    'image' => 'The :attribute must be an image.',
    'in' => 'The selected :attribute is invalid.',
    'in_array' => 'The :attribute field does not exist in :other.',
    'integer' => 'The :attribute must be an integer.',
    'ip' => 'The :attribute must be a valid IP address.',
    'ipv4' => 'The :attribute must be a valid IPv4 address.',
    'ipv6' => 'The :attribute must be a valid IPv6 address.',
    'json' => 'The :attribute must be a valid JSON string.',
    'lt' => [
        'numeric' => 'The :attribute must be less than :value.',
        'file' => 'The :attribute must be less than :value kilobytes.',
        'string' => 'The :attribute must be less than :value characters.',
        'array' => 'The :attribute must have less than :value items.',
    ],
    'lte' => [
        'numeric' => 'The :attribute must be less than or equal to :value.',
        'file' => 'The :attribute must be less than or equal to :value kilobytes.',
        'string' => 'The :attribute must be less than or equal to :value characters.',
        'array' => 'The :attribute must not have more than :value items.',
    ],
    'mac_address' => 'The :attribute must be a valid MAC address.',
    'max' => [
        'numeric' => 'The :attribute must not be greater than :max.',
        'file' => 'The :attribute must not be greater than :max kilobytes.',
        'string' => 'The :attribute must not be greater than :max characters.',
        'array' => 'The :attribute must not have more than :max items.',
    ],
    'mimes' => 'The :attribute must be a file of type: :values.',
    'mimetypes' => 'The :attribute must be a file of type: :values.',
    'min' => [
        'numeric' => 'The :attribute must be at least :min.',
        'file' => 'The :attribute must be at least :min kilobytes.',
        'string' => 'The :attribute must be at least :min characters.',
        'array' => 'The :attribute must have at least :min items.',
    ],
    'multiple_of' => 'The :attribute must be a multiple of :value.',
    'not_in' => 'The selected :attribute is invalid.',
    'not_regex' => 'The :attribute format is invalid.',
    'numeric' => 'The :attribute must be a number.',
    'password' => 'The password is incorrect.',
    'present' => 'The :attribute field must be present.',
    'prohibited' => 'The :attribute field is prohibited.',
    'prohibited_if' => 'The :attribute field is prohibited when :other is :value.',
    'prohibited_unless' => 'The :attribute field is prohibited unless :other is in :values.',
    'prohibits' => 'The :attribute field prohibits :other from being present.',
    // 'regex' => 'The :attribute format is invalid.',
    'regex' => ' :attributeไม่ถูกต้องกรุณาใส่อีกครั้ง',
    'required' => 'The :attribute field is required.',
    'required_array_keys' => 'The :attribute field must contain entries for: :values.',
    'required_if' => 'The :attribute field is required when :other is :value.',
    'required_unless' => 'The :attribute field is required unless :other is in :values.',
    'required_with' => 'The :attribute field is required when :values is present.',
    'required_with_all' => 'The :attribute field is required when :values are present.',
    'required_without' => 'The :attribute field is required when :values is not present.',
    'required_without_all' => 'The :attribute field is required when none of :values are present.',
    'same' => 'The :attribute and :other must match.',
    'size' => [
        'numeric' => 'The :attribute must be :size.',
        'file' => 'The :attribute must be :size kilobytes.',
        'string' => 'The :attribute must be :size characters.',
        'array' => 'The :attribute must contain :size items.',
    ],
    'starts_with' => 'The :attribute must start with one of the following: :values.',
    'string' => 'The :attribute must be a string.',
    'timezone' => 'The :attribute must be a valid timezone.',
    'unique' => 'The :attribute has already been taken.',
    'uploaded' => 'The :attribute failed to upload.',
    'url' => 'The :attribute must be a valid URL.',
    'uuid' => 'The :attribute must be a valid UUID.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
        //------------------------ ข้อมูลครุภัณฑ์ --------------------------------
        'num_asset' => [
            'required' => 'กรุณาใส่หมายเลขครุภัณฑ์ให้อยู่ในรูปแบบ xxxxxxxxxxxx-xxxxx-xxxxx',
        ],
        'date_into' => [
            'required' => 'กรุณาใส่วันที่ให้อยู่ในรูปแบบ เดือน/วัน/ปี เช่น 12/25/2022',
        ],
        'name_asset' => [
            'required' => 'กรุณาใส่ชื่อครุภัณฑ์',
            'max' => 'ใส่ชื่อครุภัณฑ์ของคุณยาวมากไป'
        ],
        'detail' => [
            'required' => 'กรุณาใส่รายละเอียด',
            'max' => 'ใส่รายละเอียดครุภัณฑ์ยาวมากไป'
        ],
        'unit' => [
            'required' => 'กรุณาใส่หน่วยนับ',
            'max' => 'ใส่หน่วยนับของครุภัณฑ์ยาวมากไป'
        ],
        'place' => [
            'required' => 'กรุณาใส่สถานที่ตั้งครุภัณฑ์',
            'max' => 'ใส่ชื่อสถานที่ตั้งครุภัณฑ์ยาวมากไป'
        ],
        'per_price' => [
            'required' => 'กรุณาใส่ราคา/หน่วยให้อยู่รูปแบบ xx.xx เช่น 20.00',
        ],
        /* 'num_old_asset' => [
            'required' => 'กรุณาใส่หมายเลขครุภัณฑ์เก่าให้อยู่รูปแบบ xxxx-xxx-xx-xx/xxxxx',
        ],*/
        'num_old_asset' => [
            'required' => 'กรุณาใส่หมายเลขครุภัณฑ์เก่า',
        ],
        'fullname' => [
            'required' => 'กรุณาใส่ชื่อ - สกุลผู้ครอบครองครุภัณฑ์',
        ],
        'department' => [
            'required' => 'กรุณาเลือกฝ่ายที่ครอบครองครุภัณฑ์',
        ],
        'other_department' => [
            'required' => 'กรุณาเลือกฝ่ายที่ครอบครองครุภัณฑ์',
        ],
        'name_info' => [
            'required' => 'กรุณาใส่ชื่อ - สกุล ผู้นำเข้าคลัง',
        ],
        'num_department' => [
            'required' => 'กรุณาใส่เลขอัตรา (เลขประจำตำแหน่ง)',
        ],
        'code_money' => [
            'required' => 'กรุณาเลือกเลขแหล่งเงิน',
        ],
        'name_money' => [
            'required' => 'กรุณาเลือกชื่อแหล่งเงิน',
        ],
        'budget' => [
            'required' => 'กรุณาเลือกปีงบประมาณ',
        ],



        //--------------------------------------------------------------

        //------------ จัดการผู้ใช้งาน ---------------
        'name' => [
            'required' => 'กรุณาใส่ชื่อ - นามสกุล',
            'max' => 'ใส่ชื่อ - นามสกุล ยาวเกินไป',
        ],
        'email' => [
            'required' => 'กรุณาใส่อีเมล ผู้ใช้งาน',
        ],
        'num_position' => [
            'required' => 'กรุณาใส่เลขอัตรา (เลขประจำตำแหน่ง)',
        ],
        'position' => [
            'required' => 'กรุณาใส่ตำแหน่ง',
        ],
        'department' => [
            'required' => 'กรุณาใส่ชื่อฝ่าย',
        ],
        'task' => [
            'required' => 'กรุณาใส่ชื่องาน',
        ],
        'is_admin' => [
            'required' => 'กรุณาใส่สิทธิ์ในการใช้งานได้แค่เลข "0" และ "1" เท่านั้น',
        ],
        //--------------------------------------------------------------

        //------- การเบิกครุภัณฑ์ --------
        'FullName' => [
            'required' => 'กรุณาใส่ชื่อ - สกุลผู้เบิกครุภัณฑ์',
        ],
        'date_bring' => [
            'required' => 'กรุณาใส่วันที่ให้อยู่ในรูปแบบ เดือน/วัน/ปี เช่น 12/25/2022',
        ],
        'Date_into' => [
            'required' => 'กรุณาใส่วันที่ให้อยู่ในรูปแบบ เดือน/วัน/ปี เช่น 12/25/2022',
        ],


    ],




    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [
        //-- ข้อมูลครุภัณฑ์ ----
        'num_asset' => 'หมายเลขครุภัณฑ์ให้อยู่ในรูปแบบ xxxxxxxxxxxx-xxxxx-xxxxx ',
        'per_price' => 'ราคา/หน่วยให้อยู่รูปแบบ xx.xx เช่น 20.00 ',
        'num_department' => 'เลขอัตรา (เลขประจำตำแหน่ง)',
        //-------------------

        //-------- จัดการผู้ใช้งาน --------

        'num_position' => 'เลขอัตรา (เลขประจำตำแหน่ง)',
        'is_admin' => 'สิทธิ์การใช้งาน',
    ],

];
