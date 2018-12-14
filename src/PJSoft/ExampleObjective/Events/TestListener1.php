<?php
    /*
        Copyright © 2018 PJSoft All Rights Reserved.
        
        This program is free software: you can redistribute it and/or modify
        it under the terms of the GNU General Public License as published by
        the Free Software Foundation, either version 3 of the License, or
        (at your option) any later version.
        
        This program is distributed in the hope that it will be useful,
        but WITHOUT ANY WARRANTY; without even the implied warranty of
        MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
        GNU General Public License for more details.
        
        You should have received a copy of the GNU General Public License
        along with this program.  If not, see <http://www.gnu.org/licenses/>.
     */
    
    declare(strict_types=1);
    
    namespace PJSoft\ExampleObjective\Events;
    
    use PJSoft\ExampleObjective\Main;
    use PJSoft\ExampleObjective\Tasks\TestTask2;
    use pocketmine\event\Listener;
    use pocketmine\event\player\PlayerJoinEvent;
    
    class TestListener1 implements Listener
    {
        /** @var Main */
        private $owner;
        
        //インスタンス生成時 new TestListener1();をしたときの引数を設定
        public function __construct(Main $owner)
        {
            //$this->owner (private $owner)にMainクラスを入れる
            $this->owner = $owner;
        }
        
        //プレイヤーがJoinしたとき
        public function onJoin(PlayerJoinEvent $event): void
        {
            //$playerにプレイヤーオブジェクトを代入する($playerに入れる)
            $player = $event->getPlayer();
            //TestTask2を10秒後に呼ぶ
            $this->owner->getScheduler()->scheduleDelayedTask(new TestTask2($this->owner, $player), 20 * 10);
        }
    }