<?php

 $array = [
 	'one',
 	'two',
 	'three'
// keys are = index number

 ];
print_r($array) . PHP_EOL;
echo $array[1] . PHP_EOL;

// assoc. array keys must be unique only diff. between reg and assoc.

	$assoc_array = [
		'key0' => 'one',
		'key1' => 'two',
		'key2' => 'three'

	];
	echo $assoc_array['key1'] . PHP_EOL;

// diff between multi and assoc. is multi contains another array as a value.

	$multi_array = [
		'groceries' => ['apples', 'bananas', 'pears'],
		'store' => 'HEB',
		'money' => '13.00'

	];

	echo $multi_array['store'] . PHP_EOL;
	echo $multi_array['groceries'][2] . PHP_EOL;
	echo $multi_array['money'] . PHP_EOL;

// multi-multi-array with several layers

$multi_array = [
		'groceries' => [
				'item1' => 'apples', 
				'item2' => 'bananas',
				'adtItem' => ['pears', 'schnapps', 'tequila']
				],
		'store' => 'HEB',
		'money' => 13.00

		];

	echo $multi_array['store'] . PHP_EOL;
	echo $multi_array['groceries']['item2'] . PHP_EOL;
	echo $multi_array['groceries']['adtItem'][1] . PHP_EOL;
//----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------


// $trees = array(
//     'Scale' => array(
//         'genus' => 'Lepidodendron',
//         'species' => 'freakius',
//         'extinct' => true,
//     ),
//     'Lambert Pine' => array(
//         'genus' => 'Pinus',
//         'species' => 'lambertiana',
//         'extinct' => false
//     ),
//     'English Oak' => array(
//         'genus' => 'Quercus',
//         'species' => 'robur',
//         'extinct' => false
//     ),
//     'Coast Redwood' => array(
//         'genus' => 'Sequoia',
//         'species' => 'sempervirens',
//         'extinct' => false
//     )
// );

// // For each tree, output the following:

// // ---------------
// // Scale Tree (Lepidodendron freakius)
// // Extinct? Yes
// // ---------------

// // foreach ($students as $student) {
// //     foreach ($student as $key => $value) {
// //         echo "Student's $key is $value\n";
// //     }
// // }

// 	foreach ($trees as $treeName => $properties) {
// 			echo "-------------------------------------------------------" . PHP_EOL;
// 			echo $treeName . ' tree: ' . $properties['genus'] . ': ' . $properties['species'] . PHP_EOL;
// 			if($properties['extinct'] == True ) {
// 				echo "Extinct? " . "TRUE" . PHP_EOL;
// 				echo "----------------------------------------------------" . PHP_EOL;
// 			}
// 			else{
// 				echo $treeName . " is still alive and among us" . PHP_EOL;
// 				echo "----------------------------------------------------" . PHP_EOL;
// 			}
			
// 			// echo "Extinct? " . $treeSubName[2] . PHP_EOL;
// 		}


?>