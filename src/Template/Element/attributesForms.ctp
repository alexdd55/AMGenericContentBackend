<?php
/**
 * Created by PhpStorm.
 * User: alexandermarquardt
 * Date: 19.11.17
 * Time: 17:47
 */

foreach ($attributes as $attribute) {
    //  pr($attribute);
    $val = '';
    if (isset($attribute['attribute_values'])) {
        $val = $attribute['attribute_values']['value'];
    };

    $props = [
        'value' => $val,
        'class' => 'form-control',
        'label' => $attribute['name']
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
    $formname = 'attributes.'.$attribute['attribute_values']['table'] . '.' . $attribute['attribute_values']['value_id'] . '.value';
    if ($attribute['attribute_values']['value_id'] == null) {
        $formname = 'attributes.'.$attribute['attribute_values']['table'] . '.' . $attribute['attribute_values']['id'] . '.value';
    }

    echo $this->Form->control($formname, $props);

}


