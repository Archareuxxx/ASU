# ASU
> Advance Secure Uploader (ASU), is a simple program that is effective in preventing misuse of upload/uploadify.php files that upload malicious programs with double extensions such as malicious.php.jpg, in addition you can also limit the maximum size of files to be uploaded and change the encryption of file names so that files can be disguised.

> Feature
- prevent uploading files with
double extensions
- Validate file MIME type.
- encrypt file names after upload, making them difficult to find except by the server owner.
- limit the maximum size of files to be uploaded

> Installation guide
- git clone https://github.com/Archareuxxx/ASU.git

# Notes
- Make sure your server supports PHP.
- Place the secure-file-upload folder in your server directory.
- Make sure the uploads folder is writable by the server:
> chmod 755 uploads/
