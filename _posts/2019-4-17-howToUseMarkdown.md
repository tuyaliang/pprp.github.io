Markdown
--------

How to use Markdown to Draw pictures?

[Markdown demo](./doc/Markdown.html)

[Using Mermaid](https://mermaidjs.github.io/flowchart.html)

[Simple Learn](http://note.youdao.com/iyoudao/?p=2411)

[Advanced Learn](http://note.youdao.com/iyoudao/?p=2445)

大佬博客
------

http://hzwer.com/8877.html
http://ppwwyyxx.com/blog/
https://www.byvoid.com/zhs/
http://yuandong-tian.com/

高端网络设计经验： http://karpathy.github.io/2019/04/25/recipe/


```txt

---
layout: post
title:  "Image Fisher Vectors In Python"
date:   2014-12-05 22:10:33 +0200
permalink: machinelearning/fisher-vectors-python
categories: MachineLearning
---

{% highlight python %}
    import cv2
    from AmbrosioTortorelliMinimizer import *

    img = cv2.imread("image.jpg", 0)
    solver = AmbrosioTortorelliMinimizer(img)
    img, edges = solver.minimize()
{% endhighlight %}

Overview:
---------

1\. The target image J should be similar to the input image I.  
2\. The target image J should be smooth, except at a set of edges B.  
3\. There should be few edges.  

```