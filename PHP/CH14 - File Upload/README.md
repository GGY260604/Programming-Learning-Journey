# CH14 - File Upload

This chapter teaches how PHP handles uploaded files from an HTML form.

File upload is a common backend feature. It can be used for profile pictures, documents, receipts, assignment submissions, product images, and many other systems.

## Files in This Chapter

| No. | File | Main Concept |
| --- | --- | --- |
| 01 | 01 - Basic File Upload.php | Upload one file using `$_FILES` and `move_uploaded_file()` |
| 02 | 02 - Validate File Type.php | Validate uploaded file type using MIME type checking |
| 03 | 03 - Validate File Size.php | Limit uploaded file size before saving it |
| 04 | 04 - Rename Uploaded File.php | Rename uploaded files to avoid duplicate names and unsafe filenames |
| 05 | 05 - Upload Image Preview.php | Upload an image and display a preview after successful upload |

## Folder Used in This Chapter

```text
CH14 - File Upload/
└── uploads/
    └── .gitkeep
```

The `uploads` folder stores files uploaded through the examples.

The `.gitkeep` file is only used to keep the empty folder inside the project structure.

## Important Form Requirements

To upload a file, the form must use:

```html
<form method="post" enctype="multipart/form-data">
```

Without `enctype="multipart/form-data"`, the file will not be sent correctly to PHP.

The file input uses:

```html
<input type="file" name="uploaded_file">
```

PHP receives the uploaded file through:

```php
$_FILES["uploaded_file"]
```

## Important `$_FILES` Keys

| Key | Meaning |
| --- | --- |
| `name` | Original filename from the user's computer |
| `type` | Browser-reported file type, not fully reliable |
| `tmp_name` | Temporary file path on the server |
| `error` | Upload error code |
| `size` | File size in bytes |

## Important Functions

| Function | Purpose |
| --- | --- |
| `move_uploaded_file()` | Move uploaded file from temporary location to your folder |
| `basename()` | Get the filename part from a path |
| `pathinfo()` | Get file extension and filename information |
| `finfo_file()` | Check the real MIME type of a file |
| `getimagesize()` | Check whether a file is a valid image |
| `random_bytes()` | Generate random data for safer filenames |

## Security Reminder

File upload can be risky if handled carelessly.

A real system should usually:

1. Check upload error code.
2. Validate file type.
3. Validate file size.
4. Rename uploaded files.
5. Store files in a safe folder.
6. Avoid trusting the original filename.
7. Avoid allowing executable files such as PHP files.

## How to Run

1. Put the `PHP` folder inside XAMPP `htdocs`.
2. Start Apache from XAMPP Control Panel.
3. Open the file through `localhost`.
4. Do not run these files by double-clicking them directly.

Example path format:

```text
http://localhost/PHP/CH14%20-%20File%20Upload/01%20-%20Basic%20File%20Upload.php
```
