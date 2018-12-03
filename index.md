

# Welcome to pprp 's homePage

[TOC]

##  科创

- 2018/6/14
  - [科研方面安排](./doc/科研方面.md)
- 2018/8/13
  - [近期安排](./doc/工作安排.md)
- 2018/8/15
  - [目前进度](./doc/目前进度.md)
- 2018/8/20
  - [近期关注重点](./doc/近期关注重点.md)
- 2018/9/9
  - [最新安排](./doc/工作安排.md)
- 2018/9/18
  - [最新安排](./doc/最新安排)
- 2018/10/29
  - [近期安排](./doc/10-29近期安排.md)

## 思路与工作

- 测试mAP,画图
- 看论文，准备论文相关的内容
  - 画loss图
  - 跑实验
  - 跑一下
- 通过加大 w, h 的值提升小目标检测效果
- 学习率的设置，先大后小效果比较好
- 模型剪枝
- 创造更改网络
- 更改v3_improved网络，将maxpooling换成conv

## 链接

[yolov3实战理解cfg文件](https://blog.csdn.net/phinoo/article/details/83022101)

[卷积网络参数计算方法](https://blog.csdn.net/qian99/article/details/79008053)

[YOLOV3实战5：利用三方工具绘制P-R曲线](https://blog.csdn.net/phinoo/article/details/83025690)

[YOLOV3可视化](https://blog.csdn.net/qq_34806812/article/details/81459982)

[Yolov3可视化2](https://blog.csdn.net/oTengYue/article/details/81365185)

[Opencv yolov3](https://blog.csdn.net/qq_27158179/article/details/81915740?tdsourcetag=s_pctim_aiomsg)

[OPENCV YOLOv3 实践](https://blog.csdn.net/haoqimao_hard/article/details/82081285)

[darknet 预训练模型与cfg文件](https://pjreddie.com/darknet/imagenet/#darknet19_448)

[deeplearning.ai](https://www.deeplearning.ai/)

[Fast . ai](https://www.youtube.com/results?search_query=fast.ai)

[Yolov3修改基础网络darknet19](https://blog.csdn.net/cgt19910923/article/details/83176997?tdsourcetag=s_pctim_aiomsg)

[Yolov3网络改进以及修改](https://blog.csdn.net/sum_nap/article/details/80781587)

[准确率召回率的理解](https://www.cnblogs.com/Zhi-Z/p/8728168.html)

[YOLOv3增加网络结构](https://blog.csdn.net/sum_nap/article/details/80781587)

[yotube yolo9000](https://www.youtube.com/watch?v=GBu2jofRJtk)

[Opencv-python教程](https://www.kancloud.cn/aollo/aolloopencv/269602)

## 保留

输出图像的计算方法：

<center>output = （input-filter_size+2*padding）/（stride）+ 1</center>

常用组合：

- 组合一：conv 不改变feature大小，改变filter：
  - size=3*3
  - pad=1
  - stride=1
- 组合二:   max Pooling 不改变任何参数
  - stride=1
  - size=2
- 组合三：conv 只改filter,不改feature大小：
  - size=1
  - stride=1
  - pad=1

yolo层的前一层filter计算方法：

<center>filters = (classes + 5) * 预测框的个数</center>




#### 参数说明


- batch_normalize:[了解链接](https://blog.csdn.net/yujianmin1990/article/details/78764597)

- filter: 卷积核个数，也是输出通道个数

- size: 卷积核尺寸

- stride: 卷积步长

- pad: 补0

  ```
  batch=64                     ★ 这儿batch与机器学习中的batch有少许差别，仅表示网络积累多少个样本后进行一次BP 
  subdivisions=16              ★ 这个参数表示将一个batch的图片分sub次完成网络的前向传播
                               ★★ 敲黑板：在Darknet中，batch和sub是结合使用的，例如这儿的batch=64，sub=16表示训练的过
                               程中将一次性加载64张图片进内存，然后分16次完成前向传播，意思是每次4张，前向传播的循环过程中
                               累加loss求平均，待64张图片都完成前向传播后，再一次性后传更新参数
                               ★★★ 调参经验：sub一般设置16，不能太大或太小，且为8的倍数，其实也没啥硬性规定，看着舒服就好
                               batch的值可以根据显存占用情况动态调整，一次性加减sub大小即可，通常情况下batch越大越好，还需
                               注意一点，在测试的时候batch和sub都设置为1，避免发生神秘错误！
  width=608                    ★ 网络输入的宽width
  height=608                   ★ 网络输入的高height
  channels=3                   ★ 网络输入的通道数channels
                               ★★★ width和height一定要为32的倍数，否则不能加载网络
                               ★ 提示：width也可以设置为不等于height，通常情况下，width和height的值越大，对于小目标的识别
                               效果越好，但受到了显存的限制，读者可以自行尝试不同组合
                               
  momentum=0.9                 ★ 动量 DeepLearning1中最优化方法中的动量参数，这个值影响着梯度下降到最优值得速度
  decay=0.0005                 ★ 权重衰减正则项，防止过拟合
  
  angle=0                      ★ 数据增强参数，通过旋转角度来生成更多训练样本
  saturation = 1.5             ★ 数据增强参数，通过调整饱和度来生成更多训练样本
  exposure = 1.5               ★ 数据增强参数，通过调整曝光量来生成更多训练样本
  hue=.1                       ★ 数据增强参数，通过调整色调来生成更多训练样本
  ```

- yolo层：

  ```
  [yolo]                       ★ YOLO层配置说明
  mask = 0,1,2                 ★  使用anchor的索引，0，1，2表示使用下面定义的anchors中的前三个anchor
  anchors = 10,13,  16,30,  33,23,  30,61,  62,45,  59,119,  116,90,  156,198,  373,326   
  classes=80                   ★ 类别数目
  num=9                        ★ 每个grid cell总共预测几个box,和anchors的数量一致。当想要使用更多anchors时需要调大num
  jitter=.3                    ★ 数据增强手段，此处jitter为随机调整宽高比的范围，该参数不好理解，在我的源代码注释中有详细说明
  ignore_thresh = .7
  truth_thresh = 1             ★ 参与计算的IOU阈值大小.当预测的检测框与ground true的IOU大于ignore_thresh的时候，参与
                               loss的计算，否则，检测框的不参与损失计算。
                               ★ 理解：目的是控制参与loss计算的检测框的规模，当ignore_thresh过于大，接近于1的时候，那么参与
                               检测框回归loss的个数就会比较少，同时也容易造成过拟合；而如果ignore_thresh设置的过于小，那么
                               参与计算的会数量规模就会很大。同时也容易在进行检测框回归的时候造成欠拟合。
                               ★ 参数设置：一般选取0.5-0.7之间的一个值，之前的计算基础都是小尺度（13*13）用的是0.7，
                               （26*26）用的是0.5。这次先将0.5更改为0.7。参考：https://www.e-learn.cn/content/qita/804953
  random=1                     ★ 为1打开随机多尺度训练，为0则关闭
                               ★★ 提示：当打开随机多尺度训练时，前面设置的网络输入尺寸width和height其实就不起作用了，width
                               会在320到608之间随机取值，且width=height，没10轮随机改变一次，一般建议可以根据自己需要修改
                               随机尺度训练的范围，这样可以增大batch，望读者自行尝试！
  ```



##  Personal Health Management

- persist exercising every day

##  Programming Skills 

- [web实验三](./doc/实验3董佩杰2016012963.pdf)
- [乘法表](./doc/1九九乘法表/js.html)
- [tablegenerator](./doc/2表格生成器/tablegenerator.html)
- [图片循环展示](./doc/10DOM图片循环/cycle.html)
- [图片循环展示(jquery)](./doc/11JQuery图片循环/jquery.html)

##  English Learning

- By now, I have finished the 4th and 6th English exam and I hope I can get good grade.



## Markdown

I am Using Markdown to create this blog and I will make full use of this blog to improve my self and sharing my personal thought, life perception.

How to use Markdown to Draw pictures?

[Markdown demo](./doc/Markdown.html)

[Using Mermaid](https://mermaidjs.github.io/flowchart.html)

[Simple Learn](http://note.youdao.com/iyoudao/?p=2411)

[Advanced Learn](http://note.youdao.com/iyoudao/?p=2445)

## Support or Contact

- My personal Information
- QQ: 1115957667
- Github: [pprp's github](www.github.com/pprp)
- Another Blog: [pprp's home](https://www.cnblogs.com/pprp)