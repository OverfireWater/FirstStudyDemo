//获取元素节点
let hotWord = document.querySelector('.hot-word');
let list = document.querySelector('.list');
let search = document.querySelector('.search');
let searchLog = document.querySelector('.search-log');
let wrap = document.querySelector('.search>div');
let form = document.querySelector('.form');

//切换输入框的关键字
(function () {
    let hotWords = ['苹果手机', '家用电器', '电脑', '女鞋', '户外', '显示器', '图书', '教育', '电子书'];
    let index = 0;//表示数组下标
    //设置HTML的标准属性：元素节点.属性="属性值"
    setInterval(function () {
        index++;
        //范围校验
        if (index > hotWords.length - 1) {
            index = 0;
        }
        //设置placeholder属性
        hotWord.placeholder = hotWords[index];
    }, 3000);
})();

//模糊查询
//input当内容发生改变触发
//change当内容确定改变触发
let listArr = ['苹果手机', '华为手机', '小米手机', '魅族手机', '三星手机', '苹果13', '苹果12', '苹果13 pro', '苹果手表'];
hotWord.oninput = function () {
    //清空div
    list.innerHTML = '';
    //获取input的value值
    let value = hotWord.value;
    //和数组元素对比
    for (let i = 0; i < listArr.length; i++) {
        //在数组元素中查找value值
        if (listArr[i].indexOf(value) !== -1) {
            //添加到div中
            list.innerHTML = list.innerHTML + `<p>${listArr[i]}</p>`;
            //显示div
            list.style.display = 'block';
        }
    }
}
//失去焦点
hotWord.onblur = function () {
    //隐藏div
    list.style.display = 'none';
}

//轮播图
let img = document.getElementById('img');
let prev = document.querySelector('.prev');
let next = document.querySelector('.next');
let lis = document.querySelectorAll('.banner-btn>li');
let slideBanner = document.querySelector('.slide-banner');
let imgArr = ['1.jpg', '2.webp', '3.jpg', '4.jpg', '5.jpg', '6.jpg', '7.jpg', '8.jpg'];
let i = 0;

//封装切换的函数
function banner() {
    //清空样式
    for (let k = 0; k < lis.length; k++) {
        lis[k].className = '';
    }
    //设置图片的路径
    img.src = 'images/' + imgArr[i];
    //设置点的样式
    lis[i].className = 'btn-active';
}

//封装自动切换的函数
function autoBanner() {
    i++;
    if (i > imgArr.length - 1) {
        i = 0;
    }
    banner();
}

let timer = setInterval(autoBanner, 3000);
//鼠标移入停止定时器
slideBanner.onmouseover = function () {
    clearInterval(timer);
}
//鼠标离开开启定时器
slideBanner.onmouseout = function () {
    timer = setInterval(autoBanner, 3000);
}

//下一张
next.onclick = function () {
    i++;
    if (i > imgArr.length - 1) {
        i = 0;
    }
    //设置图片路径
    banner();
}
//上一张
prev.onclick = function () {
    i--;
    if (i < 0) {
        i = imgArr.length - 1;
    }
    //设置图片路径
    banner();
}

//点击点
//拿到所有点
for (let j = 0; j < lis.length; j++) {
    //绑定点击事件
    lis[j].onmouseover = function () {
        //设置图片路径
        i = j;
        banner();
    }
}

//楼层效果
let elevator = document.querySelector('.elevator');
let header = document.querySelector('.header');
let items = document.querySelectorAll('.items');
let eleA = document.querySelectorAll('.elevator>a');

//header+banner的高度
let to = header.offsetHeight + slideBanner.offsetHeight + 40;//基础的距离

//声明一个数组，存储四个div距上面的距离
let floor = [];
//拿到四个div
for (let i = 0; i < items.length; i++) {
    to = to + items[i].offsetHeight
    floor.push(to);
}
console.log(floor);

//封装去掉a样式的函数
function clear() {
    for (let i = 0; i < eleA.length; i++) {
        eleA[i].className = '';
    }
}


//给页面绑定滚动监听事件
window.onscroll = function () {
    //获取滚动条距上面的距离
    let top = document.documentElement.scrollTop || document.body.scrollTop;
    //获取元素距上面的距离
    let top1 = header.offsetHeight + slideBanner.offsetHeight + 40;
    console.log(top1);
    //判断
    if (top >= top1) {
        //固定定位
        elevator.className = 'elevator elevator-fix';
    } else {
        elevator.className = 'elevator';
    }

    //楼层效果
    //判断top距上面的距离，对应的a修改字体颜色
    if (top >= top1 && top < floor[0]) {
        clear();
        eleA[0].className = 'active';
    }
    else if (top >= floor[0] && top <= floor[1]) {
        clear();
        eleA[1].className = 'active';
    }
    else if (top >= floor[1] && top < floor[2]) {
        clear();
        eleA[2].className = 'active';
    }
    else if (top >= floor[2]) {
        clear();
        eleA[3].className = 'active';
    }
    if (top < top1) {
        clear();
    }

    //吸顶效果
    if (top >= top1 - 62) {
        //固定定位
        search.className = 'search header-fix';
        //动画指向完毕回到初始化的状态  top:-52px;
        search.style.top = '0';
        //左侧小logo显示
        searchLog.style.display = 'block';
        //搜索框中显示水平居中的div
        wrap.className = 'wrap';
        //设置搜索框距左侧和上侧的距离
        form.style.marginTop = '7px';
        form.style.marginLeft = '260px';
    } else {//不满足条件回复原本样式
        search.className = 'search';
        searchLog.style.display = 'none';
        wrap.className = '';
        form.style.marginTop = '25px';
        form.style.marginLeft = '70px';
    }
}

