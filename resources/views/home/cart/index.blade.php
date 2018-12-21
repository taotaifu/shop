@extends('home.layouts.master')
@section('content')
    {{--头部--}}
    <div id="hd-box">
        <div class="beij_center">
            <div class="cart-main-header clearfix">
                <div class="cart-col-1">
                    <input v-model="allCheckStatus" @click="allChecked()" type="checkbox" class="jdcheckbox">
                </div>
                <div class="cart-col-2">全选</div>
                <div class="cart-col-3">商品信息</div>
                <div class="cart-col-4">
                    <div class="cart-good-real-price">单价</div>
                </div>
                <div class="cart-col-5">数量</div>
                <div class="cart-col-6">
                    <div class="cart-good-amount">小计</div>
                </div>
                <div class="cart-col-7">操作</div>
            </div>
        </div>
        {{--中间内容--}}
        {{--<div id="hd-box">--}}
            <div class="container">
                <div v-for="(v,k) in carts" class="cart-shop-goods dangq_honh">
                    <div class="cart-shop-good">
                        <div class="cart-col-1">
                            <input @click="select(v)" v-model="v.checked" type="checkbox" class="jdcheckbox">
                        </div>
                        <div class="cart-col-2" style="height: 82px;">
                            <a href="" target="_blank" class="g-img"><img :src="v.pic" alt=""></a>
                        </div>
                        <div class="fl houj_c">
                            <div class="cart-dfsg">
                                <div class="cart-good-name"><a :href="'/home/content/'+v.good_id" target="_blank">@{{v.title}}</a></div>
                            </div>
                            <div class="cart-good-pro"></div>
                            <div class="cart-col-4">
                                <div class="cart-good-real-price "><!--主品-->¥&nbsp;@{{ v.price }}元</div>
                                <div class="red"></div>
                            </div>
                            <div class="cart-col-5">
                                <div class="gui-count cart-count">
                                    <a href="javascript:;" gui-count-sub="" @click="reduce(v)" class="gui-count-btn gui-count-sub gui-count-disabled">-</a>
                                    <a href="javascript:;" gui-count-add="" @click="add(v)" class="gui-count-btn gui-count-add">+</a>
                                    <div class="gui-count-input">
                                        <input v-model="v.num" @change="exchange(v)" type="text" value="1">
                                    </div>
                                </div>
                            </div>
                            <div class="cart-col-6 ">
                                <div class="cart-good-amount">¥&nbsp;@{{v.num*v.price}}元</div><!-- 重量展示(只展示全球百货的重量) --></div>
                        </div>
                        <div class="cart-col-7">
                            <div class="cart-good-fun delfixed">
                                <a href="javascript:;" @click="del(v,k)">删除</a>
                            </div>
                            <div class="cart-good-fun">
                                <a href="#">移入收藏夹</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{--总算--}}
            <div class="jies_beij">
                <div class="beij_center over_dis">
                    <div class="jies_ann_bei">
                        <p>已选 <em>@{{ hasChecked.length }}</em> 件商品 总计（不含运费）：<span>￥:@{{ totalPrice }}</span></p>
                        <a href="javascript:;" @click="settlement()" class="order_btn">去结算</a>
                    </div>
                </div>
            </div>
            {{--@{{ hasChecked }}--}}
        </div>
        @endsection

        @push('js')
            <script src="{{asset ('org/layer/layer.js')}}"></script>
            <script src="https://cdn.bootcss.com/vue/2.5.21/vue.min.js"></script>
            <script src="https://cdn.bootcss.com/axios/0.19.0-beta.1/axios.min.js"></script>
            <script>
                new Vue({
                    el: '#hd-box',
                    data: {
                        carts:{!! $carts !!},
                        // 代表全部选中属性
                        allCheckStatus: false,
                        // 记录当前谁是选中的状态
                        hasChecked:[],
                        // // 取taotal
                        // hd_total: '30',
                    },
                    methods: {
                        // 去结算
                        settlement(){
                            if (this.hasChecked==0){
                                layer.msg('请选择商品');
                                return;
                            }else {
                                // 跳转页面
                                location.href = "{{route('home.settlement.index')}}?ids=" + this.hasChecked;
                            }
                        },
                        // 全选
                        allChecked() {
                            // alert(111);
                            // 选中的状态// true跟false转换
                            // this.allCheckStatus = !this.allCheckStatus;
                            // console.log(this.carts)
                            // 根据全选状态变换让单选状态变化
                            // 循环所有的购物车状态
                            this.carts.forEach((v, k) => {
                                // 判断全选的状态时为true 不是全选的状态为true
                                if (!this.allCheckStatus) {
                                    if (!v.checked) {
                                        this.hasChecked.push(v.id);
                                    }
                                    v.checked = true;
                                } else {
                                    // 检测制定的元素在不在数组中 在数组中返回改元素的位置 找不到该元素就返回一个标识
                                    var pos = this.hasChecked.indexOf(v.id);
                                    // 取消选中 就把当前购物车的id涮选出去
                                    this.hasChecked.splice(pos, v.id);

                                    v.checked = false;

                                }
                            });
                        },


                        // 单选
                        select(v) {
                            // alert(1)
                            // true跟false转换
                            v.checked = !v.checked;
                            // 判断选中的状态 为true是选中 为false未选中
                            if (v.checked) {
                                // 把选中的购物车id 放到一个数组
                                this.hasChecked.push(v.id);
                            } else {
                                // 检测制定的元素在不在数组中 在数组中返回改元素的位置 找不到该元素就返回一个标识
                                var pos = this.hasChecked.indexOf(v.id);
                                // 取消选中 就把当前购物车的id涮选出去
                                this.hasChecked.splice(pos, 1);
                            }
                            // 判断选中的数组中的下标id个数 等于 下面统计购物车总数量的个数 代表全选 否则就不是全选
                            if(this.hasChecked.length == this.carts.length){
                                this.allCheckStatus = true;
                            }else{
                                this.allCheckStatus = false;
                            }

                        },
                        // 数量增加
                        add(v) {
                            // console.log(v);
                            // 判断数量大于库存量
                            if (v.num > this.hd_total) {
                                layer.msg('不能再多了,要破产了！！');
                                return;
                            } else {
                                v.num++;
                                this.update(v);
                            }

                        },
                        // 数量减少
                        reduce(v) {
                            // 判断数据不能小于1
                            if (v.num <= 1) {
                                v.num = 1,
                                    layer.msg('不能再少了,老板！！');
                                return;
                            } else {
                                v.num--;
                                this.update(v)
                            }

                        },
                        // 直接input框中填写数据
                        exchange(v) {
                            this.update(v)
                        },

                        // 更新方法
                        update(v) {
                            axios.put("/home/cart/" + v.id, {
                                num: v.num,
                                id: v.spec_id,
                            }).then(function (response) {
                                // console.log(response.total);
                                this.hd_total = response.total;
                                // // 判断
                                // if (v.num) {
                                //     v.num > this.hd_total;
                                //     return;
                                // } else {
                                //
                                // }
                            });


                        },
                         // 删除
                         del(v,k){
                             axios.delete("/home/cart/" + v.id).then((response)=>{
                                 this.carts.splice(k,1);
                             })

                         }
                    },

                    // 计算属性
                    computed: {
                        totalPrice() {
                            // 初始值为0
                            let total = 0;
                            // 循环所有的购物车商品数据
                            this.carts.forEach((v, k) => {
                                // 判断选中状态
                                if (v.checked) {
                                    total += v.price * v.num;
                                }
                            })
                            // 返还值
                            return total;
                        }

                    }
                });


            </script>
    @endpush
