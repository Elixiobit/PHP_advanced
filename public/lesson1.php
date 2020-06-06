<?php
class A {
    public function foo() {
        static $x = 0;
        echo ++$x;
    }
}
$a1 = new A();
$a2 = new A();
$a1->foo(); // 1  т.к. префиксный инкремент сразу увеличивает $a на 1
$a2->foo(); // 2 т.к. статика предадущее значение увеличивается $a на 1
$a1->foo(); // 3 т.к. статика предадущее значение увеличивается $a на 1
$a2->foo(); // 4 т.к. статика предадущее значение увеличивается $a на 1

class C {
    public function foo() {
        static $x = 0;
        echo ++$x;
    }
}
class D extends C {
}
$a1 = new C();
$b1 = new D();
$a1->foo(); // 1  т.к. префиксный инкремент сразу увеличивает $a на 1
$b1->foo(); // 1  т.к. префиксный инкремент сразу увеличивает $a на 1 при вызове статика будет относиться к классу B
$a1->foo(); // 2  т.к. префиксный инкремент сразу увеличивает $a на 1 при вызове статика будет относиться к классу A
$b1->foo(); // 2  т.к. префиксный инкремент сразу увеличивает $a на 1 при вызове статика будет относиться к классу B

