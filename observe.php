<?php
/**
 * Project:zhiqiang.cao
 * User: zhiqiang.cao
 * Date: 2015/7/24/14:35
 * Filename: observe.php
 */
//    观察者设计模式
Class Order{
    private $username;
    private $charge;
    private $order;
    private $time;
    public function __set($name,$val){
        if(!isset($this->$name)){
            $this->$name = $val;
        }
    }
    public function __get($name){
        if(isset($this->$name)){
            return $this->$name;
        }
    }
}
Class OrderObject implements SplSubject{
    private $observeStorge;
    private $order;
    public function __construct($order){
        $this->observeStorge = new SplObjectStorage();
        $this->order = $order;
    }
    public function attach(SplObserver $observer){
        $this->observeStorge->attach($observer);
    }
    public function detach(SplObserver $observer){
        $this->observeStorge->detach($observer);
    }
    public function notify(){
        foreach($this->observeStorge as $val){
            $val->update($this);
        }
    }
    public function getOrder($msg){
        return $this->order;
    }
}
Class OrderAction implements SplObserver{
    public function update(SplSubject $subject){
        var_dump($subject->getOrder('订单处理！被观察！'));
//        实际业务逻辑
    }
}
Class MailAction implements SplObserver{
    public function update(SplSubject $subject){
        var_dump($subject->getOrder('邮件发送！被观察'));
//        实际业务逻辑
    }
}
Class UserAction implements SplObserver{
    public function update(SplSubject $subject){
        var_dump($subject->getOrder('用户信息！被观察'));
//        实际业务逻辑
    }
}
$order = new Order();
$order->username = 'zhiqiangbuxi';
$order->charge = '111111111111111';
$order->time = time();
$order->order = '2222222222222222';
$actionOrder = new OrderAction();
$mailOrder = new MailAction();
$userOrder = new UserAction();
$splOrder = new OrderObject($order);
$splOrder->attach($actionOrder);
$splOrder->attach($mailOrder);
$splOrder->attach($userOrder);
$splOrder->notify();
?>