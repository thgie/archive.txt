# archive.txt
_a most minimal cms to produce websites out of text archives_

i truely believe, on of humanities biggest achievements is the txt-file. it's just pure and innocent data. _archive.txt_ lives on top of a bunch of folders and txt-files and renders that structure into a website.

## installation
1. git clone git@github.com:thgie/archive.txt.git
2. cd archive.txt
3. composer install

## routing
archive.txt tries to find a file either by mapping /example/file to `content/example/file.md` _or if this doesn't exist to_ `content/example/file/index.md`.

no routing necessary for physical files (css, images, etc) that exist.

## templating
all the metainformation parameters are passed to the template.

## content
all content should be in the `/content` folder. the folder structure becomes url structure. the files can be plain text or with markdown and can even contain meta-information.

a file is built as follows:

```
title: archive.txt
description: the metainformation is formated with yaml
date: Feb 20, 2020
---
# archive.txt

the content can be formated with _markdown_
```

no metainformation parameters are necessary, but they are passed to the template parts. Everything above the triple-line is converted to parameters.

image references are always relative to the markdown file. like this, the reference works locally and on the server w/o problems.

## cms manual

# playground

### Salute 👋

You can log in by adding *?login* to the url. The login data would be in `conf/conf.conf`. Make sure to md5 hash the password.

After that you will see some icons in the upper right corner. These would be

- ➕ - add new page (_C_ on keyboard)
- ✏️ - edit current page (_E_)
- 🗃️ - move current page (_M_)
- 🖼️ - File manager (_F_)

The pages are formatted in [Markdown](https://www.markdownguide.org/getting-started/). However, a markdown editor is installed for easier handling. The move function is a bit tricky 😅 because you have to enter the path yourself. Otherwise the file manager can do this quite well.

While editing you have three new icons in the upper right corner:

- 💾 - Save
- 👁️ - View without saving
- 🖼️ - Again file manager (handy if you want to upload an image which you can then embed)

The paths to images must always be specified in relation to the integration. I have configured this so that the image can be displayed on the local computer.

A page is also always a file. So if the current page was here `/notes/todos/today.md` and the picture was here `/notes/todos/resources` then the picture would have to be included on the page _[today](/notes/todos/today)_ like this:

`![](resources/image.jpg)`

I hope this makes sense... 😅

---

Everything that comes before the first `---' is interpreted as metadata. A page does not need metadata, but certain things are very practical. For example, `title' is displayed in the browser tab or in the preview in the list template.

The [list template](/list) simply lists other pages from a folder you can configure. Thereby `title`, `date` and `tags` are read out. At the moment it still craps out if you don't specify a `date'. It's best to open the list and the subpages and edit them to see how it works in practice. The template is not very nice yet.

I have set this wiki so that you have to log in. But you can use 'login: false' in the page metadata to say that a page can be viewed without login (e.g. this one 😅). Of course, this can also be reversed: All pages can be viewed without login (but can only be edited with login) and, if desired, a page with 'login: true' can only be viewed with login. I would have to add something like a user management. So that some users can edit and others only view.

---

Finally, there would be the possibility to configure headers and footers, for example for navigation. But I haven't made it editable via this interface yet.

### license
where not otherwise stated: licensend under CC0 1.0 Universal - https://creativecommons.org/publicdomain/zero/1.0/
