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
    
    namespace PJSoft\ExampleObjective\Tasks;
    
    use PJSoft\ExampleObjective\Main;
    use pocketmine\scheduler\Task;
    
    class TestTask1 extends Task
    {
        
        private $owner;
    
        //インスタンス生成時 new TestTask1();をしたときの引数を設定
        public function __construct(Main $owner)
        {
            //$this->owner (private $owner)にMainクラスを入れる
            $this->owner = $owner;
        }
        
        public function onRun(int $currentTick): void
        {
            //コンソールにメッセージを送る
            $this->owner->getLogger()->info("コンソールに送ります");
            //メッセージを全員に送る
            $this->owner->getServer()->broadcastMessage("全体に送ります");
        }
        
    }