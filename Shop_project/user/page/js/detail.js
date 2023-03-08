let arrowPrev = document.querySelector('.arrow-prev');
let arrowNext = document.querySelector('.arrow-next');
let listInfo = document.querySelector('.list-info>ul');
let smallImg = document.querySelector('.small-img');
let lists = document.querySelectorAll('.list-info li');
let listImg = document.querySelectorAll('.list-info img');
let smallBox = document.querySelector('.small-box');
let glass = document.querySelector('.glass');
let bigBox = document.querySelector('.big-box');
let bigImg = document.querySelector('.big-box>img');
//下一张
arrowNext.onclick = function () {
    listInfo.style.left = '-232px';
}
//上一张
arrowPrev.onclick = function () {
    listInfo.style.left = '0';
}
//切换上面的大图
//思路：设置大图的路径为鼠标移入的小图的路径
//鼠标移入li
for (let i = 0; i < lists.length; i++) {
    lists[i].onmouseover = function () {
        //清空样式
        for (let j = 0; j < lists.length; j++) {
            lists[j].className = '';
        }
        //给对应的li设置class
        lists[i].className = 'img-hover';
        //设置上面图片的路径
        //把对应小图的路径赋值给上面的大图
        smallImg.src = listImg[i].src;
        //设置放大镜显示出大图的路径
        bigImg.src = listImg[i].src;

    }
}

//放大镜
//鼠标移入小盒子，显示放大镜和大盒子
smallBox.onmouseover = function () {
    glass.style.display = 'block';
    bigBox.style.display = 'block';
}

//鼠标移出小盒子，隐藏放大镜和大盒子
smallBox.onmouseout = function () {
    glass.style.display = 'none';
    bigBox.style.display = 'none';
}

//鼠标在小盒子中移动
smallBox.onmousemove = function (e) {
    e = e || window.event;
    //获取放大镜的位置
    //    鼠标距浏览器窗口的距离  放大镜的一半       小盒子距父元素的距离
    let top = e.clientY - glass.offsetHeight / 2 - smallBox.offsetTop;
    let left = e.clientX - glass.offsetWidth / 2 - smallBox.offsetLeft;

    //范围校验
    if (top <= 0) {
        top = 0;
    } else if (top >= smallBox.offsetHeight - glass.offsetHeight) {
        top = smallBox.offsetHeight - glass.offsetHeight;
    }
    if (left <= 0) {
        left = 0;
    } else if (left >= smallBox.offsetWidth - glass.offsetWidth) {
        left = smallBox.offsetWidth - glass.offsetWidth;
    }

    //设置回去
    glass.style.top = top + 'px';
    glass.style.left = left + 'px';

    //设置右侧大图显示的比例
    //获取左侧放大镜移动的比例
    //percentY是求得是放大镜在可移动范围之内移动的百分比
    //                                可以移动的范围
    let percentY = top / (smallBox.offsetHeight - glass.offsetHeight);
    let percentX = left / (smallBox.offsetWidth - glass.offsetWidth);
    //大图在大盒子中移动的比例同放大镜在小盒子中移动的比例，只是方向相反(大图的大小大于大盒子的大小)
    //求大图的位置
    let top1 = percentY * (bigImg.offsetHeight - bigBox.offsetHeight);
    let left1 = percentX * (bigImg.offsetWidth - bigBox.offsetWidth);
    //设置大图的位置
    bigImg.style.left = -left1 + 'px';
    bigImg.style.top = -top1 + 'px';

}



//选显卡
let tabMain = document.querySelectorAll('.tab-main li');
let tabItems = document.querySelectorAll('.tab-items');
//拿到所有li
for (let i = 0; i < tabMain.length; i++) {
    //绑定点击事件
    tabMain[i].onclick = function () {
        //清空
        for (let j = 0; j < tabMain.length; j++) {
            tabMain[j].className = '';
            tabItems[j].className = 'tab-items';
        }
        //对应的div显示
        tabItems[i].className = 'con-active';
        //对应的li修改样式
        tabMain[i].className = 'tab-active';
    }
}
//购物车
let buyNum = document.querySelector('.buy-num');
let add = document.querySelector('.add');
let minus = document.querySelector('.minus');
//加
add.onclick = function () {
    buyNum.value++;
    //判断value，当value大于1，减的按钮可以点击
    if (buyNum.value > 1) {
        minus.className = 'minus';
    }
}
//减
minus.onclick = function () {
    buyNum.value--;
    //范围
    if (buyNum.value <= 1) {
        buyNum.value = 1;
        minus.className = 'minus disablede';
    }
}
//返回顶部
window.onload = function(){
    // 1.注册窗口滚动事件
    window.onscroll = function(){
        // 找到返回顶部的ICON
        var returnTopICON = document.getElementById("back-top");
        //非IE滚动的距离
        //console.log(document.documentElement.scrollTop);
        //IE滚动的距离
        //console.log(document.body.scrollTop);

        // Math.max 取非IE和IE两个滚动距离的最大值
        var scrollDistance = Math.max(document.documentElement.scrollTop, document.body.scrollTop);
        // 2. 滚动离顶部的距离大于400时，显示ICON
        if(scrollDistance > 400){
            returnTopICON.style.display = 'block';
        }else{
            returnTopICON.style.display = 'none';
        }
    }

    //3. 注册点击事件，返回顶部 ==>> 即设置scrollTop 的值为0
    var returnTopICON = document.getElementById("back-top");
    returnTopICON.onclick = function(){
        // 直接设置为0，是没有过渡效果的
        // document.documentElement.scrollTop = 0;
        // document.body.scrollTop = 0;

        // 4. 用定时器做返回顶部的滚动效果
        var dsj = setInterval(function(){
            var distance = Math.max(document.documentElement.scrollTop, document.body.scrollTop);
            distance -= 1000;
            if(distance <= 0){
                document.documentElement.scrollTop = 0;
                document.body.scrollTop = 0;
                //如果滚动的距离 <= 0 时，清除掉定时器，否则点击图标滚动到顶部后，不能往下拉，一拉就又滚动到顶部
                clearInterval(dsj);
            }else{
                document.documentElement.scrollTop = distance;
                document.body.scrollTop = distance;
            }
        },10);
    }
}
//返回页面顶部
// let backTop = document.querySelector('.back-top');
// backTop.onclick = function () {
//     //回到页面顶部
//     document.documentElement.scrollTop = document.body.scrollTop = 0;
// }
// $('html').animate({scrollTop:0},300);