
<?php
############################# Header
header("Access-Control-Allow-Headers: *");
header('Access-Control-Allow-Credentials: true');
header("Access-Control-Allow-Methods: GET, PUT, POST, DELETE");
//header('Access-Control-Allow-Origin: *');
define('Kh4nhHuy3z!99^H2S04','Fuck You',true);
#############################


############################# Role validate
$ACCEPT_ROLES = array('ADMIN');
include_once("../connect.php");
#############################
session_start();

$method = $_SERVER['REQUEST_METHOD'];
$linkRequest = "http://quest1.gunvip.vn/";
if ($method == 'POST'){
    // Method is POST
} else if ($method == 'GET'){	
	$xmlName = $_GET['xml'];
	downloadFile($linkRequest.$xmlName.".xml", "../xml/".$xmlName.".xml");	
	$xmlfile = fopen("../xml/".$xmlName.".xml",'rb');
	$compressedXml = fread($xmlfile, filesize("../xml/".$xmlName.".xml"));
	fclose($xmlfile);		
	if ($xmlName == "itemstrengthengoodsinfo") {
		$uncompressedXml = zlib_decode($compressedXml); 
		$xml = new SimpleXMLElement($uncompressedXml);	
		$res = $xml->xpath("//Item");
		@$data->query("truncate table Item_Strengthen_Goods");
		sqlsrv_begin_transaction(@$data->conn);
		$i = 0;
		while($i < Count($res)) {
			$CurrentEquip = intval($res[$i]['CurrentEquip']);
			$Level = intval($res[$i]['Level']);
			$OriginalEquip = intval($res[$i]['OriginalEquip']);
			$GainEquip = intval($res[$i]['GainEquip']);
			sqlsrv_query(@$data->conn,("insert into Item_Strengthen_Goods (CurrentEquip, Level, OrginEquip, GainEquip) values('$CurrentEquip', '$Level', '$OriginalEquip', '$GainEquip')"));
			$i++;
		}
		sqlsrv_commit(@$data->conn);
		echo json_encode("ok");
		return;
	} else if ($xmlName == "goldequiptemplateload") {
		$uncompressedXml = zlib_decode($compressedXml); 
		$xml = new SimpleXMLElement($uncompressedXml);	
		$res = $xml->xpath("//item");
		@$data->query("truncate table GoldEquipTemplateLoad");
		sqlsrv_begin_transaction(@$data->conn);
		$i = 0;
		while ($i < Count($res)) {
			$OldTemplateId = intval ($res[$i]['OldTemplateId']);
			$NewTemplateId = intval ($res[$i]['NewTemplateId']);
			$CategoryID = intval ($res[$i]['CategoryID']);
			$Strengthen = intval ($res[$i]['Strengthen']);
			$Attack = intval ($res[$i]['Attack']);
			$Defence = intval ($res[$i]['Defence']);
			$Agility = intval ($res[$i]['Agility']);
			$Luck = intval ($res[$i]['Luck']);
			$Damage = intval ($res[$i]['Damage']);
			$Guard = intval ($res[$i]['Guard']);
			$Boold = intval ($res[$i]['Boold']);
			$BlessID = intval ($res[$i]['BlessID']);
			$Pic = ($res[$i]['Pic']);
			sqlsrv_query(@$data->conn,("insert into GoldEquipTemplateLoad (OldTemplateId, NewTemplateId, CategoryID, Strengthen, Attack, Defence, Agility, Luck, Damage , Guard , Boold, BlessID, Pic) 
			values('$OldTemplateId', '$NewTemplateId', '$CategoryID', '$Strengthen', '$Attack', '$Defence', '$Agility', '$Luck', '$Damage', '$Guard', '$Boold', '$BlessID', '$Pic')"));
			$i++;
		}
		sqlsrv_commit(@$data->conn);
		echo json_encode("ok");
		return;
	} else if ($xmlName == "runetemplatelist") {
		$uncompressedXml = zlib_decode($compressedXml); 
		$xml = new SimpleXMLElement($uncompressedXml);	
		$res = $xml->xpath("//Rune");
		@$data->query("truncate table Rune_Template");
		sqlsrv_begin_transaction(@$data->conn);
		$i = 0;
		while ($i < Count($res)){
			$TemplateID = intval ($res[$i]['TemplateID']);
			$NextTemplateID = intval ($res[$i]['NextTemplateID']);
			$Name = ($res[$i]['Name']);
			$BaseLevel = intval ($res[$i]['BaseLevel']);
			$MaxLevel = intval ($res[$i]['MaxLevel']);
			$Type1 = intval ($res[$i]['Type1']);
			$Attribute1 = ($res[$i]['Attribute1']);
			$Turn1 = intval ($res[$i]['Turn1']);
			$Rate1 = intval ($res[$i]['Rate1']);
			$Type2 = intval ($res[$i]['Type2']);
			$Attribute2 = ($res[$i]['Attribute2']);
			$Turn2 = intval ($res[$i]['Turn2']);
			$Rate2 = intval ($res[$i]['Rate2']);
			$Type3 = intval ($res[$i]['Type3']);
			$Attribute3 = ($res[$i]['Attribute3']);
			$Turn3 = intval ($res[$i]['Turn3']);
			$Rate3 = intval ($res[$i]['Rate3']);
			sqlsrv_query(@$data->conn,("insert into Rune_Template (TemplateID,NextTemplateID,Name,BaseLevel,MaxLevel,Type1,Attribute1,Turn1,Rate1,Type2,Attribute2,Turn2,Rate2,Type3,Attribute3,Turn3,Rate3)
			values('$TemplateID','$NextTemplateID',N'$Name','$BaseLevel','$MaxLevel','$Type1','$Attribute1','$Turn1','$Rate1','$Type2','$Attribute2','$Turn2','$Rate2','$Type3','$Attribute3','$Turn3','$Rate3')"));
			$i++;
		}
		sqlsrv_commit(@$data->conn);
		echo json_encode("ok");
		return;
	} else if ($xmlName == "balllist") {
		$uncompressedXml = zlib_decode($compressedXml); 
		$xml = new SimpleXMLElement($uncompressedXml);	
		$res = $xml->xpath("//Item");
		@$data->query("truncate table Ball");
		sqlsrv_begin_transaction(@$data->conn);
		$i = 0;
		while ($i < Count($res)){
			$ID = intval ($res[$i]['ID']);
			$Name = 'Vũ khí';
			$Power = floatval($res[$i]['Power']);
			$Radii = intval ($res[$i]['Radii']);
			$FlyingPartical = ($res[$i]['FlyingPartical']);
			$BombPartical = ($res[$i]['BombPartical']);
			$Crater = ($res[$i]['Crater']);
			$AttackResponse = intval ($res[$i]['AttackResponse']);
			$IsSpin = intval ($res[$i]['IsSpin']);
			$Mass = intval ($res[$i]['Mass']);
			$SpinVA = intval ($res[$i]['SpinVA']);
			$SpinV = intval ($res[$i]['SpinV']);
			$Amount = intval ($res[$i]['Amount']);
			$Wind = intval ($res[$i]['Wind']);
			$DragIndex = intval ($res[$i]['DragIndex']);
			$Weight = intval ($res[$i]['Weight']);
			$Shake = intval ($res[$i]['Shake']);
			$ShootSound = ($res[$i]['ShootSound']);
			$BombSound = ($res[$i]['BombSound']);
			$Delay = 200;
			$ActionType = intval ($res[$i]['ActionType']);
			$HasTunnel = 1;
			sqlsrv_query(@$data->conn,("insert into Ball (ID,Name,Power,Radii,FlyingPartical,BombPartical,Crater,AttackResponse,IsSpin,Mass,SpinVA,SpinV,Amount,Wind,DragIndex,Weight,Shake,ShootSound,
			BombSound,Delay,ActionType,HasTunnel) values('$ID',N'$Name','$Power','$Radii','$FlyingPartical','$BombPartical','$Crater','$AttackResponse','$IsSpin','$Mass','$SpinVA','$SpinV','$Amount','$Wind',
			'$DragIndex','$Weight','$Shake','$ShootSound','$BombSound','$Delay','$ActionType','$HasTunnel')"));
			$i++;
		}
		//Ball Config
		downloadFile($linkRequest."bombconfig.xml", "../xml/bombconfig.xml");	
		$xmlfile = fopen("../xml/bombconfig.xml",'rb');
		$compressedXml = fread($xmlfile, filesize("../xml/bombconfig.xml"));
		fclose($xmlfile);
		$uncompressedXml = zlib_decode($compressedXml); 
		$xml = new SimpleXMLElement($uncompressedXml);	
		$res = $xml->xpath("//Item");
		@$data->query("truncate table [BallConfig]");
		sqlsrv_begin_transaction(@$data->conn);
		$i = 0;
		while ($i < Count($res)){
			$TemplateID = intval ($res[$i]['TemplateID']);
			$Common = intval ($res[$i]['Common']);
			$CommonAddWound = intval ($res[$i]['CommonAddWound']);
			$CommonMultiBall = intval ($res[$i]['CommonMultiBall']);
			$Special = intval ($res[$i]['Special']);
			sqlsrv_query(@$data->conn,("insert into [BallConfig] (TemplateID,Common,CommonAddWound,CommonMultiBall,Special) values('$TemplateID','$Common','$CommonAddWound','$CommonMultiBall','$Special')"));
			$i++;
		}
		sqlsrv_commit(@$data->conn);
		echo json_encode("ok");
		return;
	} else if ($xmlName == "newtitleinfo") {
		$xml = new SimpleXMLElement($compressedXml);	
		$res = $xml->xpath("//Item");
		@$data->query("truncate table [New_Title]");
		sqlsrv_begin_transaction(@$data->conn);
		$i = 0;
		while ($i < Count($res)){
			$ID = intval ($res[$i]['ID']);
			$Order = intval ($res[$i]['Order']);
			$Show = intval ($res[$i]['Show']);
			$Name = ($res[$i]['Name']);
			$Pic = intval ($res[$i]['Pic']);
			$Att = intval ($res[$i]['Att']);
			$Def = intval ($res[$i]['Def']);
			$Agi = intval ($res[$i]['Agi']);
			$Luck = intval ($res[$i]['Luck']);
			$HP = 0;
			$Damage = 0;
			$Guard = 0;
			$Desc = ($res[$i]['Desc']);
			sqlsrv_query(@$data->conn,("insert into [New_Title] ([ID],[Order],[Show],[Name],[Pic],[Att],[Def],[Agi],[Luck],[HP],[Damage],[Guard],[Desc]) values('$ID','$Order','$Show',N'$Name','$Pic','$Att','$Def','$Agi',
			'$Luck','$HP','$Damage','$Guard',N'$Desc')"));
			$i++;
		}
		sqlsrv_commit(@$data->conn);
		echo json_encode("ok");
		return;
	} else if ($xmlName == "shopitemlist") {
		$uncompressedXml = zlib_decode($compressedXml); 
		$xml = new SimpleXMLElement($uncompressedXml);	
		$res = $xml->Store->xpath("//Item");
		@$data->query("truncate table [Shop]");
		sqlsrv_begin_transaction(@$data->conn);
		$i = 0;
		while ($i < Count($res)){
			$ID = intval ($res[$i]['ID']);
			$ShopID = intval ($res[$i]['ShopID']);
			$GroupID = intval ($res[$i]['GroupID']);
			$TemplateID = intval ($res[$i]['TemplateID']);
			$BuyType = intval ($res[$i]['BuyType']);
			$IsContinue = ($res[$i]['IsContinue']);
			$IsBind = intval ($res[$i]['IsBind']);
			$IsVouch = intval ($res[$i]['IsVouch']);
			$Label = intval ($res[$i]['Label']);
			$Beat = intval ($res[$i]['Beat']);
			$AUnit = intval ($res[$i]['AUnit']);
			$APrice1 = intval ($res[$i]['APrice1']);
			$AValue1 = intval ($res[$i]['AValue1']);
			$APrice2 = intval ($res[$i]['APrice2']);
			$AValue2 = intval ($res[$i]['AValue2']);
			$APrice3 = intval ($res[$i]['APrice3']);
			$AValue3 = intval ($res[$i]['AValue3']);
			$BUnit = intval ($res[$i]['BUnit']);
			$BPrice1 = intval ($res[$i]['BPrice1']);
			$BValue1 = intval ($res[$i]['BValue1']);
			$BPrice2 = intval ($res[$i]['BPrice2']);
			$BValue2 = intval ($res[$i]['BValue2']);
			$BPrice3 = intval ($res[$i]['BPrice3']);
			$BValue3 = intval ($res[$i]['BValue3']);
			$CUnit = intval ($res[$i]['CUnit']);
			$CPrice1 = intval ($res[$i]['CPrice1']);
			$CValue1 = intval ($res[$i]['CValue1']);
			$CPrice2 = intval ($res[$i]['CPrice2']);
			$CValue2 = intval ($res[$i]['CValue2']);
			$CPrice3 = intval ($res[$i]['CPrice3']);
			$Sort = 0;
			$CValue3 = intval ($res[$i]['CValue3']);
			$IsCheap = ($res[$i]['IsCheap']);
			$LimitCount = intval ($res[$i]['LimitCount']);
			$StartDate = ($res[$i]['StartDate']);
			$EndDate = ($res[$i]['EndDate']);
			$ValidDate = 0;
			$StrengthenLevel = 0;
			$Compose = 0;
			sqlsrv_query(@$data->conn,("insert into [Shop] (ID,ShopID,GroupID,TemplateID,BuyType,IsContinue,IsBind,IsVouch,Label,Beat,AUnit,APrice1,AValue1,APrice2,AValue2,APrice3,AValue3,
			BUnit,BPrice1,BValue1,BPrice2,BValue2,BPrice3,BValue3,CUnit,CPrice1,CValue1,CPrice2,CValue2,CPrice3,Sort,CValue3,IsCheap,LimitCount,StartDate,EndDate,ValidDate,StrengthenLevel,Compose) 
			values('$ID','$ShopID','$GroupID','$TemplateID','$BuyType','$IsContinue','$IsBind','$IsVouch','$Label','$Beat','$AUnit','$APrice1','$AValue1','$APrice2','$AValue2','$APrice3','$AValue3',
			'$BUnit','$BPrice1','$BValue1','$BPrice2','$BValue2','$BPrice3','$BValue3','$CUnit','$CPrice1','$CValue1','$CPrice2','$CValue2','$CPrice3','$Sort','$CValue3','$IsCheap','$LimitCount',
			'$StartDate','$EndDate','$ValidDate','$StrengthenLevel','$Compose')"));
			$i++;
		}
		downloadFile($linkRequest."shopgoodsshowlist.xml", "../xml/shopgoodsshowlist.xml");	
		$xmlfile = fopen("../xml/shopgoodsshowlist.xml",'rb');
		$compressedXml = fread($xmlfile, filesize("../xml/shopgoodsshowlist.xml"));
		fclose($xmlfile);
		$uncompressedXml = zlib_decode($compressedXml); 
		$xml = new SimpleXMLElement($uncompressedXml);	
		$res = $xml->xpath("//Item");
		@$data->query("truncate table [ShopGoodsShowList]");
		sqlsrv_begin_transaction(@$data->conn);
		$i = 0;
		while ($i < Count($res)){
			$Type = intval ($res[$i]['Type']);
			$ShopId = intval ($res[$i]['ShopId']);
			$NeedVip = 0;
			sqlsrv_query(@$data->conn,("insert into [ShopGoodsShowList] (Type,ShopId,NeedVip) values('$Type','$ShopId','$NeedVip')"));
			$i++;
		}
		sqlsrv_commit(@$data->conn);
		echo json_encode('ok');
		return;
	} else if ($xmlName == "templatealllist") {
		$uncompressedXml = zlib_decode($compressedXml); 
		$xml = new SimpleXMLElement($uncompressedXml);	
		$res = $xml->ItemTemplate->xpath("//Item");
		@$data->query("truncate table [Shop_Goods]");
		sqlsrv_begin_transaction(@$data->conn);
		$i = 0;
		while ($i < Count($res)){
			$TemplateID = intval ($res[$i]['TemplateID']);
			$Name = ($res[$i]['Name']);
			$Remark = '';
			$CategoryID = intval ($res[$i]['CategoryID']);
			$Description = ($res[$i]['Description']);
			$Attack = intval ($res[$i]['Attack']);
			$Defence = intval ($res[$i]['Defence']);
			$Agility = intval ($res[$i]['Agility']);
			$Luck = intval ($res[$i]['Luck']);
			$Level = intval ($res[$i]['Level']);
			$Quality = intval ($res[$i]['Quality']);
			$Pic = ($res[$i]['Pic']);
			$MaxCount = intval ($res[$i]['MaxCount']);
			$NeedSex = intval ($res[$i]['NeedSex']);
			$NeedLevel = intval ($res[$i]['NeedLevel']);
			$CanStrengthen = ($res[$i]['CanStrengthen']);
			$CanCompose = ($res[$i]['CanCompose']);
			$CanDrop = ($res[$i]['CanDrop']);
			$CanEquip = ($res[$i]['CanEquip']);
			$CanUse = ($res[$i]['CanUse']);
			$CanDelete = ($res[$i]['CanDelete']);
			$Script = ($res[$i]['Script']);
			$Data = ($res[$i]['Data']);
			$Colors = ($res[$i]['Colors']);
			$Property1 = intval ($res[$i]['Property1']);
			$Property2 = intval ($res[$i]['Property2']);
			$Property3 = intval ($res[$i]['Property3']);
			$Property4 = intval ($res[$i]['Property4']);
			$Property5 = intval ($res[$i]['Property5']);
			$Property6 = intval ($res[$i]['Property6']);
			$Property7 = intval ($res[$i]['Property7']);
			$Property8 = intval ($res[$i]['Property8']);
			$Valid = 0;
			$Count = 0;
			$AddTime = ($res[$i]['AddTime']);
			$BindType = intval ($res[$i]['BindType']);
			$FusionType = intval ($res[$i]['FusionType']);
			$FusionRate = intval ($res[$i]['FusionRate']);
			$FusionNeedRate = intval ($res[$i]['FusionNeedRate']);
			$Hole = ($res[$i]['Hole']);
			$RefineryLevel = intval ($res[$i]['RefineryLevel']);
			$ReclaimValue = intval ($res[$i]['ReclaimValue']);
			$ReclaimType = intval ($res[$i]['ReclaimType']);
			$CanRecycle = intval ($res[$i]['CanRecycle']);
			$FloorPrice = intval ($res[$i]['FloorPrice']);
			$SuitId = intval ($res[$i]['SuitId']);
			$CanTransfer = intval ($res[$i]['CanTransfer']);
			sqlsrv_query(@$data->conn,("insert into [Shop_Goods]([TemplateID],[Name],[Remark],[CategoryID],[Description],[Attack],[Defence],[Agility],[Luck],[Level],[Quality],[Pic],[MaxCount],[NeedSex],[NeedLevel],[CanStrengthen],[CanCompose],[CanDrop],[CanEquip],[CanUse],[CanDelete],[Script],[Data],[Colors],[Property1],[Property2],[Property3],[Property4],[Property5],[Property6],[Property7],[Property8],[Valid],[Count],[AddTime],[BindType],[FusionType],[FusionRate],[FusionNeedRate],[Hole],[RefineryLevel],[ReclaimValue],[ReclaimType],[CanRecycle],[FloorPrice],[SuitId],[CanTransfer])
			values ('$TemplateID', N'$Name', '$Remark', $CategoryID, N'$Description', '$Attack', '$Defence', '$Agility', '$Luck', '$Level', '$Quality', '$Pic', '$MaxCount', '$NeedSex', '$NeedLevel', '$CanStrengthen', '$CanCompose', '$CanDrop', '$CanEquip', '$CanUse', '$CanDelete', '$Script', '$DataV', '$Colors', '$Property1', '$Property2', '$Property3', '$Property4', '$Property5', '$Property6', '$Property7', '$Property8', 0, 0, '$AddTime', '$BindType', '$FusionType', '$FusionRate', '$FusionNeedRate', '$Hole', '$RefineryLevel', '$ReclaimValue', '$ReclaimType', '$CanRecycle', '$FloorPrice', '$SuitId', '$CanTransfer')"));
			$i++;
		}
		sqlsrv_commit(@$data->conn);
		echo json_encode("ok");
		return;
	} else if ($xmlName == "loadboxtemp") {
		$uncompressedXml = gzdecode($compressedXml); 
		$xml = new SimpleXMLElement($uncompressedXml);	
		//$res = $xml->xpath("//Item");
		// @$data->query("truncate table [Shop_Goods_Box]");
		// $i = 0;
		// while ($i < Count($res)){
			// $DataId = intval ($res[$i]['ID']);
			// $TemplateId = intval ($res[$i]['TemplateId']);
			// $IsSelect = intval ($res[$i]['Luck']);
			// $IsBind = intval ($res[$i]['IsBind']);
			// $ItemValid = intval ($res[$i]['ItemValid']);
			// $ItemCount = intval ($res[$i]['ItemCount']);
			// $StrengthenLevel = intval ($res[$i]['StrengthenLevel']);
			// $AttackCompose = intval ($res[$i]['AttackCompose']);
			// $DefendCompose = intval ($res[$i]['DefendCompose']);
			// $AgilityCompose = intval ($res[$i]['AgilityCompose']);
			// $LuckCompose = intval ($res[$i]['LuckCompose']);
			// $MagicAttack = intval ($res[$i]['Luck']);
			// $MagicDefence = intval ($res[$i]['Luck']);
			// $Random = 100000;
			// $IsTips = intval ($res[$i]['IsTips']);
			// $IsLogs = 1;
			// $addDate = ($res[$i]['Luck']);
		// }
		echo json_encode("ok");
		return;
	} else if ($xmlName == "npcinfolist") {
		$uncompressedXml = zlib_decode($compressedXml); 
		$xml = new SimpleXMLElement($uncompressedXml);	
		$res = $xml->xpath("//Item");
		//@$data->query("truncate table [NPC_Info]");
		$i = 0;
		while ($i < Count($res)){
			$ID = intval ($res[$i]['ID']);
			$Name = ($res[$i]['Name']);
			$Level = intval ($res[$i]['Level']);
			$Camp = intval ($res[$i]['Camp']);
			$Type = intval ($res[$i]['Type']);
			$Blood = intval ($res[$i]['Blood']);
			$MoveMin = intval ($res[$i]['MoveMin']);
			$MoveMax = intval ($res[$i]['MoveMax']);
			$BaseDamage = intval ($res[$i]['BaseDamage']);
			$BaseGuard = intval ($res[$i]['BaseGuard']);
			$Defence = intval ($res[$i]['Defence']);
			$Agility = intval ($res[$i]['Agility']);
			$Lucky = intval ($res[$i]['Lucky']);
			$ModelID = ($res[$i]['ModelID']);
			$ResourcesPath = ($res[$i]['ResourcesPath']);
			$DropRate = ($res[$i]['DropRate']);
			$Experience = intval ($res[$i]['Experience']);
			$Delay = intval ($res[$i]['Delay']);
			$Immunity = intval ($res[$i]['Immunity']);
			$Alert = intval ($res[$i]['Alert']);
			$Range = intval ($res[$i]['Range']);
			$Preserve = intval ($res[$i]['Preserve']);
			$Script = ($res[$i]['Script']);
			$FireX = intval ($res[$i]['FireX']);
			$FireY = intval ($res[$i]['FireY']);
			$DropId = intval ($res[$i]['ID']);
		}
		sqlsrv_commit(@$data->conn);
		echo json_encode("ok");
		return;
	} else if ($xmlName == "questlist") {
		$uncompressedXml = zlib_decode($compressedXml); 
		$xml = new SimpleXMLElement($uncompressedXml);	
		$res = $xml->xpath("//Item");
		@$data->query("truncate table [Quest]");
		sqlsrv_begin_transaction(@$data->conn);
		$i = 0;
		while ($i < Count($res)){
			$ID = intval ($res[$i]['ID']);
			$QuestID = intval ($res[$i]['QuestID']);
			$Title = ($res[$i]['Title']);
			$Detail = ($res[$i]['Detail']);
			$Objective = ($res[$i]['Objective']);
			$NeedMinLevel = intval ($res[$i]['NeedMinLevel']);
			$NeedMaxLevel = intval ($res[$i]['NeedMaxLevel']);
			$PreQuestID = ($res[$i]['PreQuestID']);
			$NextQuestID = ($res[$i]['NextQuestID']);
			$IsOther = intval ($res[$i]['IsOther']);
			$CanRepeat = ($res[$i]['CanRepeat']);
			$RepeatInterval = intval ($res[$i]['RepeatInterval']);
			$RepeatMax = intval ($res[$i]['RepeatMax']);
			$RewardGP = intval ($res[$i]['RewardGP']);
			$RewardGold = intval ($res[$i]['RewardGold']);
			$RewardBindMoney = intval ($res[$i]['RewardBindMoney']);
			$RewardOffer = intval ($res[$i]['RewardOffer']);
			$RewardRiches = intval ($res[$i]['RewardRiches']);
			$RewardBuffID = intval ($res[$i]['RewardBuffID']);
			$RewardBuffDate = intval ($res[$i]['RewardBuffDate']);
			$RewardMoney = intval ($res[$i]['RewardMoney']);
			$Rands = intval ($res[$i]['Rands']);
			$RandDouble = intval ($res[$i]['RandDouble']);
			$TimeMode = ($res[$i]['TimeMode']);
			$StartDate = ($res[$i]['StartDate']);
			$EndDate = ($res[$i]['EndDate']);
			$MapID = intval ($res[$i]['MapID']);
			$AutoEquip = ($res[$i]['AutoEquip']);
			$OneKeyFinishNeedMoney = intval ($res[$i]['OneKeyFinishNeedMoney']);
			$Rank = ($res[$i]['Rank']);
			$StarLev = intval ($res[$i]['StarLev']);
			$NotMustCount = intval ($res[$i]['NotMustCount']);
			$Level2NeedMoney = intval ($res[$i]['Level2NeedMoney']);
			$Level3NeedMoney = intval ($res[$i]['Level3NeedMoney']);
			$Level4NeedMoney = intval ($res[$i]['Level4NeedMoney']);
			$Level5NeedMoney = intval ($res[$i]['Level5NeedMoney']);
			$CollocationCost = intval ($res[$i]['CollocationCost']);
			$CollocationColdTime = intval ($res[$i]['CollocationColdTime']);
			$IsAccept = ($res[$i]['IsAccept']);
			$exec = sqlsrv_query(@$data->conn,("insert into [Quest](ID,QuestID,Title,Detail,Objective,NeedMinLevel,NeedMaxLevel,PreQuestID,NextQuestID,IsOther,CanRepeat,
			RepeatInterval,RepeatMax,RewardGP,RewardGold,RewardBindMoney,RewardOffer,RewardRiches,RewardBuffID,RewardBuffDate,RewardMoney,Rands,RandDouble,TimeMode,StartDate,
			EndDate,MapID,AutoEquip,OneKeyFinishNeedMoney,Rank,StarLev,NotMustCount,Level2NeedMoney,Level3NeedMoney,Level4NeedMoney,Level5NeedMoney,CollocationCost,CollocationColdTime,IsAccept)
			values ('$ID','$QuestID',N'$Title',N'$Detail','$Objective','$NeedMinLevel','$NeedMaxLevel','$PreQuestID','$NextQuestID','$IsOther','$CanRepeat','$RepeatInterval','$RepeatMax','$RewardGP','$RewardGold','$RewardBindMoney','$RewardOffer','$RewardRiches','$RewardBuffID','$RewardBuffDate','$RewardMoney','$Rands','$RandDouble','$TimeMode','$StartDate','$EndDate','$MapID','$AutoEquip','$OneKeyFinishNeedMoney','$Rank','$StarLev','$NotMustCount','$Level2NeedMoney','$Level3NeedMoney','$Level4NeedMoney','$Level5NeedMoney','$CollocationCost','$CollocationColdTime','$IsAccept')"));
			$i++;
		}
		sqlsrv_commit(@$data->conn);
		//Quest Condiction
		$res = $xml->Item->xpath("//Item_Condiction");
		@$data->query("truncate table [Quest_Condiction]");
		sqlsrv_begin_transaction(@$data->conn);
		$i = 0;
		while ($i < Count($res)){
			$QuestID = intval ($res[$i]['QuestID']);
			$CondictionID = intval ($res[$i]['CondictionID']);
			$CondictionTitle = ($res[$i]['CondictionTitle']);
			$CondictionType = intval ($res[$i]['CondictionType']);
			$Para1 = intval ($res[$i]['Para1']);
			$Para2 = intval ($res[$i]['Para2']);
			$isOpitional = ($res[$i]['isOpitional']);
			sqlsrv_query(@$data->conn,("insert into [Quest_Condiction] (QuestID,CondictionID,CondictionTitle,CondictionType,Para1,Para2,isOpitional) values('$QuestID','$CondictionID',N'$CondictionTitle','$CondictionType','$Para1','$Para2','$isOpitional')"));
			$i++;
		}
		sqlsrv_commit(@$data->conn);
		//Quest Goods 
		$res = $xml->Item->xpath("//Item_Good");
		@$data->query("truncate table [Quest_Goods]");
		sqlsrv_begin_transaction(@$data->conn);
		$i = 0;
		while ($i < Count($res)){
			$QuestID = intval ($res[$i]['QuestID']);
			$RewardItemID = intval ($res[$i]['RewardItemID']);
			$IsSelect = ($res[$i]['IsSelect']);
			$RewardItemValid = intval ($res[$i]['RewardItemValid']);
			$RewardItemCount1 = intval ($res[$i]['RewardItemCount1']);
			$RewardItemCount2 = intval ($res[$i]['RewardItemCount2']);
			$RewardItemCount3 = intval ($res[$i]['RewardItemCount3']);
			$RewardItemCount4 = intval ($res[$i]['RewardItemCount4']);
			$RewardItemCount5 = intval ($res[$i]['RewardItemCount5']);
			$StrengthenLevel = intval ($res[$i]['StrengthenLevel']);
			$AttackCompose = intval ($res[$i]['AttackCompose']);
			$DefendCompose = intval ($res[$i]['DefendCompose']);
			$AgilityCompose = intval ($res[$i]['AgilityCompose']);
			$LuckCompose = intval ($res[$i]['LuckCompose']);
			$IsCount = ($res[$i]['IsCount']);
			$IsBind = ($res[$i]['IsBind']);
			$MagicAttack = intval ($res[$i]['MagicAttack']);
			$MagicDefence = intval ($res[$i]['MagicDefence']);
			sqlsrv_query(@$data->conn,("insert into [Quest_Goods] (QuestID,RewardItemID,IsSelect,RewardItemValid,RewardItemCount1,RewardItemCount2,RewardItemCount3,RewardItemCount4,RewardItemCount5,
			StrengthenLevel,AttackCompose,DefendCompose,AgilityCompose,LuckCompose,IsCount,IsBind,MagicAttack,MagicDefence) values('$QuestID','$RewardItemID','$IsSelect','$RewardItemValid','$RewardItemCount1','$RewardItemCount2','$RewardItemCount3','$RewardItemCount4','$RewardItemCount5','$StrengthenLevel','$AttackCompose','$DefendCompose','$AgilityCompose','$LuckCompose','$IsCount','$IsBind','$MagicAttack','$MagicDefence')"));
			$i++;
		}
		sqlsrv_commit(@$data->conn);
		echo json_encode("ok");
		return;
	}
	echo ( ($uncompressedXml));
} else if ($method == 'PUT'){
    // Method is PUT
} else if ($method == 'DELETE'){

} else {
    // Method unknown
}

?>