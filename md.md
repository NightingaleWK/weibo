没错我又来了 :sweat_smile: 之前写过 [在 Laravel 8.x 中优雅且轻松的安装 Bootstrap 框架 ](https://learnku.com/laravel/t/61337 "Laravel 8.x 的教程")，这次我来写写 Laravel 9.x 的教程，之前用 Laravel Mix，现在咱们用官方推荐的 vite 工具。
## 写在前面
开发环境：
- 大环境上是 Windows 10/11 + Homestead，均为最新稳定版本
- 两个平台都安装 Node.js
- Laravel 版本为 9.x ，其他未提及的按照 9.x 版本的教程来
- **不使用 Laravel Mix，使用官方推荐的新前端打包工具 ``vite`` 完成教程里关于样式的修改任务。**

我的目的：在 Windows 和 homestead 两个平台使用 Node.js 来规避安装 Bootstrap 中能踩到的坑，让苦逼的 Win 用户学习《L01 Laravel 教程 - Web 开发实战入门》的《4.2. 样式美化》章节做到 **优雅且轻松**

不多废话，线上操作

## 操作方法
首先默认读者已经学习到《4.2. 样式美化》章节，并且很不幸的被卡住，其次，自己的 Windows 电脑和 Homestread 环境都可以运行 Node.js。Windows 下没有装 Node.js 的可通过搜索引擎搜索下载，傻瓜式的安装流程，不再赘述。

首先我们根据教程做到下方这一步，但先别执行
```
composer require laravel/ui:3.4.5 --dev
```
我们改改，这里直接获取默认的最新 laravel/ui 版本，并在 linux 内执行
```
composer require laravel/ui
php artisan ui bootstrap
```
然后我们到 windows 环境下开一个终端，比如 powershell，并执行
```
npm config set registry=https://registry.npm.taobao.org
npm i
```
然后回到你的编辑器，找到项目根目录下刚生成的 vite.coffig.js 我们修改成如下的效果
```
import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import path from 'path'

export default defineConfig({
   plugins: [
       laravel([
           'resources/js/app.js',
       ]),
   ],
   resolve: {
       alias: {
           '~bootstrap': path.resolve(__dirname, 'node_modules/bootstrap'),
       }
   },
});
```
然后在 js 中导入 boostrap 5 SCSS
```
import './bootstrap';

// 以下为新增部分
import '../sass/app.scss'
import * as bootstrap from 'bootstrap'
```
然后去项目的 blade 模板中，将原本的 mix() 代码
```
<link rel="stylesheet" href="{{ mix('css/app.css') }}">
<script src="{{ mix('js/app.js') }}"></script>
```
全部换成 @vite 代码
```
@vite(['resources/js/app.js'])
```
为啥原本两行变成一行了，别忘了，上门我们把 scss 加入到 js 中了，二合一

之后我们后期学习中，但凡牵扯到 mix 的一律按照这个思路处理

最后，在 windows 终端内一直挂着即可，即输入如下指令
```
npm run build
// 或者
npm run dev
```
至于 dev 和 build 的区分就是，dev适合开发的时候随时调整，你的修改是实时生效且自动的，build 会一步处理完毕并输出 css 和 js，只会执行一次不会自动，适合最后发布阶段。

相比较 Mix，vite 都会以闪电般的速度给你稳健的处理好，放心，vite 的处理速度实在是太快惹

## 最后碎碎念
然后相比较版主教程里让我们用特定版本学习 laravel 的方法，但我还是喜欢遵循官方的文档说明，尽量用原生方法实现相关效果，也算是版主推荐规范化思路下的一个“叛逆邪道”吧，总之希望这篇文章可以打开初学者的一个新思路，毕竟我们是学习阶段，而非生产环境开发，多学一点是一点。

相比我之前 8.x 的经验分享，这个属于新技术的学习与适配，我也没事儿看看教程就栽在新版本的新内容上了。自行学习，寻找方案，然后解决问题，学会思路比学会方法更重要，相信后期的 10.x 、100.x 版本也会有更多新内容、新变动，大家一定要掌握解决问题的思路，死板学方法是行不通的，希望各位学习路上的初学者们不要放弃这一优美的框架，要不太可惜了！

祝各位入门的初心者们，不忘初心，砥砺前行，加油！