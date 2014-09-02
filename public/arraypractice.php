<?php

//  $array = [
//  	'one',
//  	'two',
//  	'three'
// // keys are = index number

//  ];

// var_dump($array) . PHP_EOL;


// // add new data to end of array by array_push
// $newArray = ['four','five','six'];
// array_push($array,$newArray);
// var_dump($array) . PHP_EOL;


// // take items of end with array_pop
// $items = ['First', 'Second', 'Third', 'Fourth', 'Fifth', 'Sixth'];
// $last_item = array_pop($items); // would take off 'sixth' and put it in variable $last item
// echo $items + $last_item;  // prints out original array


// // take item off beg of array w array_shift
// $items = ['First', 'Second', 'Third', 'Fourth', 'Fifth'];
// $first_item = array_shift($items); // seperates 'first'
// echo $first_item + $items;


// // add item to front of an array with array_unshift
// $items = ['Second', 'Third', 'Fourth', 'Fifth'];
// array_unshift($items, 'New First Item!');
// print_r($items);



// assoc. array keys must be unique only diff. between reg and assoc.

	$assoc_array = [
		'key0' => 'one',
		'key1' => 'two',
		'key2' => 'three'

	];
	print_r($assoc_array) . PHP_EOL;

// add item to assoc. array // array push doesnt work for assc. array
	$newItem = 'four';
//	$newItem = trim(fgets(STDIN));
	$assoc_array['key3'] = $newItem;
	print_r($assoc_array) . PHP_EOL;

// use array_merge as better option for assoc. arrays
$array = array('Username' => 'user', 'Email' => 'email'); 
$array = array_merge($array, array('Password' => 'pass'));

$assoc_array = array_merge($assoc_array, array('key3' => 'four'));
print_r($assoc_array) . PHP_EOL;


// // diff between multi and assoc. is multi contains another array as a value.

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
// //----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
// adding to a multi-dimensional array
// new data to be added
$newdata =  array (
          'wpseo_title' => 'test',
          'wpseo_desc' => 'test',
          'wpseo_metakey' => 'test'
        );

//array added to
$md_array= array (
     'recipe_type' => 
      array (
        18 => 
        array (
          'wpseo_title' => 'Salads',
          'wpseo_desc' => 'Hundreads of recipes for Salads',
          'wpseo_metakey' => ''
        ),
        19 => 
        array (
          'wpseo_title' => 'Main dishes',
          'wpseo_desc' => 'Hundreads of recipes for Main dishes',
          'wpseo_metakey' => ''
        )
      ),
     'cuisine' => 
      array (
        22 => 
        array (
          'wpseo_title' => 'Italian',
          'wpseo_desc' => 'Secrets from Sicily in a click',
          'wpseo_metakey' => ''
        ),
        23 => 
        array (
          'wpseo_title' => 'Chinese',
          'wpseo_desc' => 'Oriental dishes were never this easy to make',
          'wpseo_metakey' => ''
        ),
        24 => 
        array (
          'wpseo_title' => 'Greek',
          'wpseo_desc' => 'Traditional Greek flavors in easy to make recipies',
          'wpseo_metakey' => ''
        )
      ) 
    );

// method to add $newData
$newdata =  array (
      'wpseo_title' => 'test',
      'wpseo_desc' => 'test',
      'wpseo_metakey' => 'test'
    );

// for recipe
$md_array["recipe_type"][] = $newdata;

//for cuisine
$md_array["cuisine"][] = $newdata;

//or could use array_push to add $newdata
array_push($md_array["recipe_type"],$newdata);
array_push($md_array["cuisine"],$newdata);

//---------------------------------------------------------------------------------------------------------------------------------------------------------------------
// using explode to convert a string into an array
// use this format to also insert words or characters into the string($delimiter) and an option integer that limits the number of array elements created.
$array = explode(string $delimiter , string $string [, int $limit ]);

$string = "jack, joe, john";
$newArray = explode(', ', $string);// indexes array at the ','
print_r($newArray);

//The opposite of explode() is implode().
// turns array back into a string, this time with pipes instead of ','
$string = implode('|', $newArray);
echo $string;

// converting text files into arrays using fopen fclose etc 

fopen() — Opens a file (or URL), returns a file pointer
fread() — Reads a file to a specific length using a file pointers
filesize() — Returns the size of a given file in bytes.
fclose() — Closes a handle to an open file pointer

$filename = 'cities.txt';// a text file of cities, each on a seperate line
$handle = fopen($filename, "r");//passing the "r" option to read the file. fopen() returns a file pointer, pointing to the beginning of the file's contents. We are assigning that file pointer to $handle.
$contents = fread($handle, filesize($filename));//Here we are reading the file using fread(). This function will read the contents of a file for a specific length, or until the end of the file is reached. As we are not worried about our list exceeding the bounds of memory, we can open the entire file using filesize() to return the size of the file in bytes. We are assigning the read contents to a new variable $contents.
// now we can explode the string $contents which is made up of the text file cities.txt into an array with a next line delimiter
$contents_array = explode("\n", $contents);
fclose($handle);//We use fclose() to close the file pointer handle we have to the open file when we are no longer using it.
echo $contents;
// output looks like this
print_r($contents_array);

Array
(
    [0] => Berkeley County, South Carolina
    [1] => Council Bluffs, Iowa
    [2] => Douglas County, Georgia
    [3] => Quilicura, Chile
    [4] => Mayes County, Oklahoma
    [5] => Lenoir, North Carolina
    [6] => The Dalles, Oregon
)
// writing to files so we can add cities to the text file or array using fwrite and a for each loop
'a'	Open for writing only; place the file pointer at the end of the file. If the file does not exist, attempt to create it.

$new_cities = ['Changhua County, Taiwan', 'Hamina, Finland', 'St Ghislain, Belgium', 'Dublin, Ireland'];

$filename = "txt/cities.txt";
$handle = fopen($filename, 'a');
foreach ($new_cities as $city) {
    fwrite($handle, PHP_EOL . $city);// why do we need a newline before each city? Well, the file pointer is at the end of the file, which means the end of the last line. To create an entry on a new line, we need to start with a newline character. To continue this patterns means we'll start each array item on its own line.
}
fclose($handle);


//
// another example of multi-dimensional array

// // $trees = array(
// //     'Scale' => array(
// //         'genus' => 'Lepidodendron',
// //         'species' => 'freakius',
// //         'extinct' => true,
// //     ),
// //     'Lambert Pine' => array(
// //         'genus' => 'Pinus',
// //         'species' => 'lambertiana',
// //         'extinct' => false
// //     ),
// //     'English Oak' => array(
// //         'genus' => 'Quercus',
// //         'species' => 'robur',
// //         'extinct' => false
// //     ),
// //     'Coast Redwood' => array(
// //         'genus' => 'Sequoia',
// //         'species' => 'sempervirens',
// //         'extinct' => false
// //     )
// // );

// // // For each tree, output the following:

// // // ---------------
// // // Scale Tree (Lepidodendron freakius)
// // // Extinct? Yes
// // // ---------------

// // // foreach ($students as $student) {
// // //     foreach ($student as $key => $value) {
// // //         echo "Student's $key is $value\n";
// // //     }
// // // }

// // 	foreach ($trees as $treeName => $properties) {
// // 			echo "-------------------------------------------------------" . PHP_EOL;
// // 			echo $treeName . ' tree: ' . $properties['genus'] . ': ' . $properties['species'] . PHP_EOL;
// // 			if($properties['extinct'] == True ) {
// // 				echo "Extinct? " . "TRUE" . PHP_EOL;
// // 				echo "----------------------------------------------------" . PHP_EOL;
// // 			}
// // 			else{
// // 				echo $treeName . " is still alive and among us" . PHP_EOL;
// // 				echo "----------------------------------------------------" . PHP_EOL;
// // 			}
			
// // 			// echo "Extinct? " . $treeSubName[2] . PHP_EOL;
// // 		}
// 	$input = trim(fgets(STDIN));

//-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------//
// old TODO list example of adding items to array from command line
//Create array to hold list of todo items
// $items = array();

// // The loop!
// do {
//     // Iterate through list items
//     foreach ($items as $key => $item) {
//         // Display each item and a newline
//         echo "[{$key}] {$item}\n";
//     }

//     // Show the menu options
//     echo '(N)ew item, (R)emove item, (Q)uit : ';

//     // Get the input from user
//     // Use trim() to remove whitespace and newlines
//     $input = trim(fgets(STDIN));

//     // Check for actionable input
//     if ($input == 'N') {
//         // Ask for entry
//         echo 'Enter item: ';
//         // Add entry to list array
//         $items[] = trim(fgets(STDIN));
//         return $items;

//     } elseif ($input == 'R') {
//         // Remove which item?
//         echo 'Enter item number to remove: ';
//         // Get array key
//         $key = trim(fgets(STDIN));
//         // Remove from array
//         unset($items[$key]);
//         return $items;

//     }
//     var_dump($items);
// // Exit when input is (Q)uit
// } while ($input != 'Q');

// // Say Goodbye!
// echo "Goodbye!\n";

// // Exit with 0 errors
// exit(0);	

//---------------------------------------------------------------------
// search for a particular item within an array

// $names = ['Marc Andreessen', 'Tim Berners-Lee', 'Len Bosack', 'Steve Case', 'Vint Cerf', 'Len Kleinrock', 'J.C.R. Licklider', 'Bob Metcalfe', 'Ray Tomlinson'];

// $query = 'Tim Berners-Lee';

// $result = array_search($query, $names);

// if ($result) {
//     echo $names[$result];
// }

// // ?>