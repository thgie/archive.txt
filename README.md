# archive.txt
_a most minimal cms to produce websites out of text archives_

archive.txt exists, because we needed to produce an archive of some digital content. probably the most stable and reliable container for text ist the plaintext file. voilà.

## installation
1. git clone git@github.com:thgie/archive.txt.git
2. cd archive.txt
3. composer install

## content
the actual archive content lives in the content folder where you structure content with folders. folder structure equals url structure. see routing.

a file is built as follows:

```
title: "archive.txt"
description: "the metainformation is formated with yaml"
layout: "home"
---
# archive.txt

the content can be formated with _markdown_
```

no metainformation parameters are necessary, but they are passed to the template parts. Everything above the triple-line is converted to parameters.

## templating
all the metainformation parameters are passed to the template. the rest is some echoing. it's not hard ...

## routing
archive.txt tries to find a file either by mapping /example/file to

- content/example/file.md, _or if this doesn't exist to_
- content/example/file/index.md

no routing necessary for files (css, images, etc) that exist.


### license
where not otherwise stated: licensend under CC0 1.0 Universal - https://creativecommons.org/publicdomain/zero/1.0/
