<?php

$path = 'php/dir/myfile.php';
$file = 'file1.txt';
// returns filename
// echo basename($path);

// returns filename without ext
// echo basename($path, '.php');

// returns directory name from the path
// echo dirname($path);

// checks if the file or directory exists
// echo file_exists($file);

// gets the absolute path
// echo realpath($file);

// checks if the given parameter is a regular file or not
// echo is_file($file);

/* 
    check for the files read and write permission
        is_readable() -- read premission
        is_writable() -- write permission
*/ 

/* 
    gets the file size
        filesize()
*/ 

// same as linux commands

/* 
    to make adirectory
        mkdir()
*/

/* 
    to delete directory
        rmdir()
*/

/*
    to copy file
        copy({origin}, {output})
*/ 

/*
    to rename a file
        rename({originalFile}, {renamedFile})
*/ 

/* 
to delete a file
unlink()
*/


/*
    gets to content of the file
        file_get_contents()
*/ 

/*
    write string to a file
        file_put_contents({filename}, {data})
*/ 

/*
    append to a file
        store the original file to a variable
            $current =  file_get_contents({originalFile})
            
        then concat
            $current  .= "appended string text"
        
        then replace the file
            file_put_contents({file}, $current)

*/ 


/*
    opens a file 
        fopen({fileName | URL}, {openMode})
*/ 

/* 
    reads a file 
        fread({handler}, {filesize})
*/ 

/*
    writes to a file
        fwrite({handler}, {stringText})
    overrides original data in the file
    can write multiple times as long the file is not closed
*/ 

/* 
    closes a file 
        fclose({file})
*/

?>