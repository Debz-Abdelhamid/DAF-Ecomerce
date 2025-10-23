<?php

return [

    /*
    |--------------------------------------------------------------------------
    | سطور لغة التحقق
    |--------------------------------------------------------------------------
    |
    | تحتوي سطور اللغة التالية على رسائل الخطأ الافتراضية المستخدمة بواسطة
    | صف التحقق. بعض هذه القواعد تحتوي على نسخ متعددة مثل قواعد الحجم.
    | لا تتردد في تعديل كل رسالة هنا.
    |
    */

    'accepted' => 'يجب قبول :attribute.',
    'accepted_if' => 'يجب قبول :attribute عندما يكون :other هو :value.',
    'active_url' => 'الحقل :attribute يجب أن يكون رابط URL صالح.',
    'after' => 'الحقل :attribute يجب أن يكون تاريخاً بعد :date.',
    'after_or_equal' => 'الحقل :attribute يجب أن يكون تاريخاً بعد أو مساوياً لـ :date.',
    'alpha' => 'الحقل :attribute يجب أن يحتوي على حروف فقط.',
    'alpha_dash' => 'الحقل :attribute يجب أن يحتوي على حروف وأرقام وشرطات وشرطات سفلية فقط.',
    'alpha_num' => 'الحقل :attribute يجب أن يحتوي على حروف وأرقام فقط.',
    'array' => 'الحقل :attribute يجب أن يكون مصفوفة.',
    'ascii' => 'الحقل :attribute يجب أن يحتوي فقط على أحرف وأرقام ورموز ذات بايت واحد.',
    'before' => 'الحقل :attribute يجب أن يكون تاريخاً قبل :date.',
    'before_or_equal' => 'الحقل :attribute يجب أن يكون تاريخاً قبل أو مساوياً لـ :date.',
    'between' => [
        'array' => 'الحقل :attribute يجب أن يحتوي على عناصر بين :min و :max.',
        'file' => 'الحقل :attribute يجب أن يكون بين :min و :max كيلوبايت.',
        'numeric' => 'الحقل :attribute يجب أن يكون بين :min و :max.',
        'string' => 'الحقل :attribute يجب أن يكون بين :min و :max حرف.',
    ],
    'boolean' => 'الحقل :attribute يجب أن يكون صحيحاً أو خاطئاً.',
    'can' => 'الحقل :attribute يحتوي على قيمة غير مصرح بها.',
    'confirmed' => 'تأكيد :attribute غير متطابق.',
    'contains' => 'الحقل :attribute يفتقد قيمة مطلوبة.',
    'current_password' => 'كلمة المرور غير صحيحة.',
    'date' => 'الحقل :attribute يجب أن يكون تاريخاً صالحاً.',
    'date_equals' => 'الحقل :attribute يجب أن يكون تاريخاً مساوياً لـ :date.',
    'date_format' => 'الحقل :attribute يجب أن يطابق التنسيق :format.',
    'decimal' => 'الحقل :attribute يجب أن يحتوي على :decimal منازل عشرية.',
    'declined' => 'يجب رفض :attribute.',
    'declined_if' => 'يجب رفض :attribute عندما يكون :other هو :value.',
    'different' => 'الحقل :attribute و :other يجب أن يكونا مختلفين.',
    'digits' => 'الحقل :attribute يجب أن يكون :digits رقم.',
    'digits_between' => 'الحقل :attribute يجب أن يكون بين :min و :max رقم.',
    'dimensions' => 'الحقل :attribute يحتوي على أبعاد صورة غير صالحة.',
    'distinct' => 'الحقل :attribute يحتوي على قيمة مكررة.',
    'doesnt_end_with' => 'الحقل :attribute لا يجب أن ينتهي بأحد القيم التالية: :values.',
    'doesnt_start_with' => 'الحقل :attribute لا يجب أن يبدأ بأحد القيم التالية: :values.',
    'email' => 'الحقل :attribute يجب أن يكون بريد إلكتروني صالح.',
    'ends_with' => 'الحقل :attribute يجب أن ينتهي بأحد القيم التالية: :values.',
    'enum' => 'القيمة المحددة :attribute غير صالحة.',
    'exists' => 'القيمة المحددة :attribute غير صالحة.',
    'extensions' => 'الحقل :attribute يجب أن يكون من الأنواع التالية: :values.',
    'file' => 'الحقل :attribute يجب أن يكون ملفاً.',
    'filled' => 'الحقل :attribute يجب أن يحتوي على قيمة.',
    'gt' => [
        'array' => 'الحقل :attribute يجب أن يحتوي على أكثر من :value عنصر.',
        'file' => 'الحقل :attribute يجب أن يكون أكبر من :value كيلوبايت.',
        'numeric' => 'الحقل :attribute يجب أن يكون أكبر من :value.',
        'string' => 'الحقل :attribute يجب أن يكون أكبر من :value حرف.',
    ],
    'gte' => [
        'array' => 'الحقل :attribute يجب أن يحتوي على :value عنصر أو أكثر.',
        'file' => 'الحقل :attribute يجب أن يكون أكبر من أو يساوي :value كيلوبايت.',
        'numeric' => 'الحقل :attribute يجب أن يكون أكبر من أو يساوي :value.',
        'string' => 'الحقل :attribute يجب أن يكون أكبر من أو يساوي :value حرف.',
    ],
    'hex_color' => 'الحقل :attribute يجب أن يكون لوناً عشرياً صحيحاً.',
    'image' => 'الحقل :attribute يجب أن يكون صورة.',
    'in' => 'القيمة المحددة :attribute غير صالحة.',
    'in_array' => 'الحقل :attribute يجب أن يكون موجوداً في :other.',
    'integer' => 'الحقل :attribute يجب أن يكون عدداً صحيحاً.',
    'ip' => 'الحقل :attribute يجب أن يكون عنوان IP صالح.',
    'ipv4' => 'الحقل :attribute يجب أن يكون عنوان IPv4 صالح.',
    'ipv6' => 'الحقل :attribute يجب أن يكون عنوان IPv6 صالح.',
    'json' => 'الحقل :attribute يجب أن يكون نص JSON صالحاً.',
    'list' => 'الحقل :attribute يجب أن يكون قائمة.',
    'lowercase' => 'الحقل :attribute يجب أن يكون بحروف صغيرة.',
    'lt' => [
        'array' => 'الحقل :attribute يجب أن يحتوي على أقل من :value عنصر.',
        'file' => 'الحقل :attribute يجب أن يكون أقل من :value كيلوبايت.',
        'numeric' => 'الحقل :attribute يجب أن يكون أقل من :value.',
        'string' => 'الحقل :attribute يجب أن يكون أقل من :value حرف.',
    ],
    'lte' => [
        'array' => 'الحقل :attribute يجب ألا يحتوي على أكثر من :value عنصر.',
        'file' => 'الحقل :attribute يجب أن يكون أقل من أو يساوي :value كيلوبايت.',
        'numeric' => 'الحقل :attribute يجب أن يكون أقل من أو يساوي :value.',
        'string' => 'الحقل :attribute يجب أن يكون أقل من أو يساوي :value حرف.',
    ],
    'mac_address' => 'الحقل :attribute يجب أن يكون عنوان MAC صالحاً.',
    'max' => [
        'array' => 'الحقل :attribute يجب ألا يحتوي على أكثر من :max عنصر.',
        'file' => 'الحقل :attribute يجب ألا يكون أكبر من :max كيلوبايت.',
        'numeric' => 'الحقل :attribute يجب ألا يكون أكبر من :max.',
        'string' => 'الحقل :attribute يجب ألا يكون أكبر من :max حرف.',
    ],
    'max_digits' => 'الحقل :attribute يجب ألا يحتوي على أكثر من :max رقم.',
    'mimes' => 'الحقل :attribute يجب أن يكون ملفاً من النوع: :values.',
    'mimetypes' => 'الحقل :attribute يجب أن يكون ملفاً من النوع: :values.',
    'min' => [
        'array' => 'الحقل :attribute يجب أن يحتوي على الأقل :min عنصر.',
        'file' => 'الحقل :attribute يجب أن يكون على الأقل :min كيلوبايت.',
        'numeric' => 'الحقل :attribute يجب أن يكون على الأقل :min.',
        'string' => 'الحقل :attribute يجب أن يكون على الأقل :min حرف.',
    ],
    'min_digits' => 'الحقل :attribute يجب أن يحتوي على الأقل :min رقم.',
    'missing' => 'الحقل :attribute يجب أن يكون مفقوداً.',
    'missing_if' => 'الحقل :attribute يجب أن يكون مفقوداً عندما يكون :other هو :value.',
    'missing_unless' => 'الحقل :attribute يجب أن يكون مفقوداً إلا إذا كان :other هو :value.',
    'missing_with' => 'الحقل :attribute يجب أن يكون مفقوداً عند وجود :values.',
    'missing_with_all' => 'الحقل :attribute يجب أن يكون مفقوداً عند وجود جميع :values.',
    'multiple_of' => 'الحقل :attribute يجب أن يكون مضاعفاً لـ :value.',
    'not_in' => 'القيمة المحددة :attribute غير صالحة.',
    'not_regex' => 'صيغة الحقل :attribute غير صالحة.',
    'numeric' => 'الحقل :attribute يجب أن يكون رقماً.',
    'password' => [
        'letters' => 'الحقل :attribute يجب أن يحتوي على حرف واحد على الأقل.',
        'mixed' => 'الحقل :attribute يجب أن يحتوي على حرف كبير وحرف صغير على الأقل.',
        'numbers' => 'الحقل :attribute يجب أن يحتوي على رقم واحد على الأقل.',
        'symbols' => 'الحقل :attribute يجب أن يحتوي على رمز واحد على الأقل.',
        'uncompromised' => 'الحقل :attribute ظهر في تسريب بيانات. يرجى اختيار قيمة مختلفة.',
    ],
    'present' => 'الحقل :attribute يجب أن يكون موجوداً.',
    'present_if' => 'الحقل :attribute يجب أن يكون موجوداً عندما يكون :other هو :value.',
    'present_unless' => 'الحقل :attribute يجب أن يكون موجوداً ما لم يكن :other هو :value.',
    'present_with' => 'الحقل :attribute يجب أن يكون موجوداً عند وجود :values.',
    'present_with_all' => 'الحقل :attribute يجب أن يكون موجوداً عند وجود جميع :values.',
    'prohibited' => 'الحقل :attribute محظور.',
    'prohibited_if' => 'الحقل :attribute محظور عندما يكون :other هو :value.',
    'prohibited_unless' => 'الحقل :attribute محظور إلا إذا كان :other موجوداً في :values.',
    'prohibits' => 'الحقل :attribute يمنع :other من التواجد.',
    'regex' => 'صيغة الحقل :attribute غير صالحة.',
    'required' => 'الحقل :attribute مطلوب.',
    'required_array_keys' => 'الحقل :attribute يجب أن يحتوي على إدخالات لـ: :values.',
    'required_if' => 'الحقل :attribute مطلوب عندما يكون :other هو :value.',
    'required_if_accepted' => 'الحقل :attribute مطلوب عندما يتم قبول :other.',
    'required_if_declined' => 'الحقل :attribute مطلوب عندما يتم رفض :other.',
    'required_unless' => 'الحقل :attribute مطلوب ما لم يكن :other موجوداً في :values.',
    'required_with' => 'الحقل :attribute مطلوب عند وجود :values.',
    'required_with_all' => 'الحقل :attribute مطلوب عند وجود جميع :values.',
    'required_without' => 'الحقل :attribute مطلوب عند عدم وجود :values.',
    'required_without_all' => 'الحقل :attribute مطلوب عند عدم وجود أي من :values.',
    'same' => 'الحقل :attribute يجب أن يطابق :other.',
    'size' => [
        'array' => 'الحقل :attribute يجب أن يحتوي على :size عنصر.',
        'file' => 'الحقل :attribute يجب أن يكون :size كيلوبايت.',
        'numeric' => 'الحقل :attribute يجب أن يكون :size.',
        'string' => 'الحقل :attribute يجب أن يكون :size حرف.',
    ],
    'starts_with' => 'الحقل :attribute يجب أن يبدأ بأحد القيم التالية: :values.',
    'string' => 'الحقل :attribute يجب أن يكون نصاً.',
    'timezone' => 'الحقل :attribute يجب أن يكون منطقة زمنية صالحة.',
    'unique' => 'الحقل :attribute تم أخذه مسبقاً.',
    'uploaded' => 'فشل في تحميل الحقل :attribute.',
    'uppercase' => 'الحقل :attribute يجب أن يكون بحروف كبيرة.',
    'url' => 'الحقل :attribute يجب أن يكون رابط URL صالح.',
    'ulid' => 'الحقل :attribute يجب أن يكون ULID صالحاً.',
    'uuid' => 'الحقل :attribute يجب أن يكون UUID صالحاً.',

    /*
    |--------------------------------------------------------------------------
    | تخصيص سطور لغة التحقق
    |--------------------------------------------------------------------------
    |
    | هنا يمكنك تحديد رسائل التحقق المخصصة باستخدام النمط "attribute.rule"
    | لتسمية السطور. يجعل ذلك سريع التخصيص لرسالة معينة لقاعدة معينة.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'رسالة مخصصة',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | خصائص التحقق
    |--------------------------------------------------------------------------
    |
    | تحتوي السطور التالية على استبدالات مكانية لخصائص التحقق.
    | يساعد ذلك على جعل الرسائل أكثر قابلية للفهم.
    |
    */

    'attributes' => [],

];
