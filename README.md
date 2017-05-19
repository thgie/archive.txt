# archive.txt
_a most minimal cms to produce websites out of text archives_

archive.txt exists, because we needed to produce an archive of some digital content. probably the most stable and reliable container for text ist the plaintext file. voilà.

## installation
1. git clone git@github.com:thgie/archive.txt.git
2. cd archive.txt
3. composer install

## content
a file ist structured as follows:

```
title: "archive.txt"
description: "the metainformation is formated with yaml"
---
# archive.txt

the content can be formated with _markdown_
```

no metainformation parameters are necessary, but they are passed to the template parts.

## routing
archive.txt tries to find a file either by mapping /example/file to

- content/example/file.txt, or if this doesn't exist to
- content/example/file/index.txt

no routing necessary for files (css, images, etc) that exist.