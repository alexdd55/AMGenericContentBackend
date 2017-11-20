<?php
/**
 * Created by PhpStorm.
 * User: alexandermarquardt
 * Date: 19.11.17
 * Time: 17:47
 */

foreach ($attributes as $attribute) {
    $val = '';
    if (isset($attribute['attribute_values'])) {
        $val = $attribute['attribute_values']['value'];
    };

    $props = [
        'value' => $val,
        'class' => 'form-control'
    ];
    switch ($attribute['attribute_values']['table']) {
        case 'AttributeDate':
            $props['type'] = 'text';
            break;
        case 'AttributeFile':
            $props['type'] = 'file';
            break;
        case 'AttributeBool':
            $props['type'] = 'checkbox';
            break;
        case 'AttributeInt':
            $props['type'] = 'number';
            break;
        case 'AttributeDouble':
            $props['type'] = 'number';
            break;
        case 'AttributeText':
            $props['type'] = 'textarea';
            break;
        default:
            $props['type'] = 'text';
            break;
    }

    echo $this->Form->control($attribute['name'], $props);

}


