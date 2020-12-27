<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/cloud/tasks/v2/cloudtasks.proto

namespace GPBMetadata\Google\Cloud\Tasks\V2;

class Cloudtasks
{
    public static $is_initialized = false;

    public static function initOnce() {
        $pool = \Google\Protobuf\Internal\DescriptorPool::getGeneratedPool();

        if (static::$is_initialized == true) {
          return;
        }
        \GPBMetadata\Google\Api\Annotations::initOnce();
        \GPBMetadata\Google\Api\Client::initOnce();
        \GPBMetadata\Google\Api\FieldBehavior::initOnce();
        \GPBMetadata\Google\Api\Resource::initOnce();
        \GPBMetadata\Google\Cloud\Tasks\V2\Queue::initOnce();
        \GPBMetadata\Google\Cloud\Tasks\V2\Task::initOnce();
        \GPBMetadata\Google\Iam\V1\IamPolicy::initOnce();
        \GPBMetadata\Google\Iam\V1\Policy::initOnce();
        \GPBMetadata\Google\Protobuf\GPBEmpty::initOnce();
        \GPBMetadata\Google\Protobuf\FieldMask::initOnce();
        $pool->internalAddGeneratedFile(hex2bin(
            "0a9b250a26676f6f676c652f636c6f75642f7461736b732f76322f636c6f" .
            "75647461736b732e70726f746f1215676f6f676c652e636c6f75642e7461" .
            "736b732e76321a17676f6f676c652f6170692f636c69656e742e70726f74" .
            "6f1a1f676f6f676c652f6170692f6669656c645f6265686176696f722e70" .
            "726f746f1a19676f6f676c652f6170692f7265736f757263652e70726f74" .
            "6f1a21676f6f676c652f636c6f75642f7461736b732f76322f7175657565" .
            "2e70726f746f1a20676f6f676c652f636c6f75642f7461736b732f76322f" .
            "7461736b2e70726f746f1a1e676f6f676c652f69616d2f76312f69616d5f" .
            "706f6c6963792e70726f746f1a1a676f6f676c652f69616d2f76312f706f" .
            "6c6963792e70726f746f1a1b676f6f676c652f70726f746f6275662f656d" .
            "7074792e70726f746f1a20676f6f676c652f70726f746f6275662f666965" .
            "6c645f6d61736b2e70726f746f2285010a114c6973745175657565735265" .
            "717565737412390a06706172656e741801200128094229e04102fa412312" .
            "216c6f636174696f6e732e676f6f676c65617069732e636f6d2f4c6f6361" .
            "74696f6e120e0a0666696c74657218022001280912110a09706167655f73" .
            "697a6518032001280512120a0a706167655f746f6b656e18042001280922" .
            "5b0a124c697374517565756573526573706f6e7365122c0a067175657565" .
            "7318012003280b321c2e676f6f676c652e636c6f75642e7461736b732e76" .
            "322e517565756512170a0f6e6578745f706167655f746f6b656e18022001" .
            "280922480a0f47657451756575655265717565737412350a046e616d6518" .
            "01200128094227e04102fa41210a1f636c6f75647461736b732e676f6f67" .
            "6c65617069732e636f6d2f51756575652281010a12437265617465517565" .
            "75655265717565737412390a06706172656e741801200128094229e04102" .
            "fa412312216c6f636174696f6e732e676f6f676c65617069732e636f6d2f" .
            "4c6f636174696f6e12300a05717565756518022001280b321c2e676f6f67" .
            "6c652e636c6f75642e7461736b732e76322e51756575654203e041022277" .
            "0a1255706461746551756575655265717565737412300a05717565756518" .
            "012001280b321c2e676f6f676c652e636c6f75642e7461736b732e76322e" .
            "51756575654203e04102122f0a0b7570646174655f6d61736b1802200128" .
            "0b321a2e676f6f676c652e70726f746f6275662e4669656c644d61736b22" .
            "4b0a1244656c65746551756575655265717565737412350a046e616d6518" .
            "01200128094227e04102fa41210a1f636c6f75647461736b732e676f6f67" .
            "6c65617069732e636f6d2f5175657565224a0a1150757267655175657565" .
            "5265717565737412350a046e616d651801200128094227e04102fa41210a" .
            "1f636c6f75647461736b732e676f6f676c65617069732e636f6d2f517565" .
            "7565224a0a11506175736551756575655265717565737412350a046e616d" .
            "651801200128094227e04102fa41210a1f636c6f75647461736b732e676f" .
            "6f676c65617069732e636f6d2f5175657565224b0a12526573756d655175" .
            "6575655265717565737412350a046e616d651801200128094227e04102fa" .
            "41210a1f636c6f75647461736b732e676f6f676c65617069732e636f6d2f" .
            "517565756522ab010a104c6973745461736b735265717565737412370a06" .
            "706172656e741801200128094227e04102fa4121121f636c6f7564746173" .
            "6b732e676f6f676c65617069732e636f6d2f517565756512370a0d726573" .
            "706f6e73655f7669657718022001280e32202e676f6f676c652e636c6f75" .
            "642e7461736b732e76322e5461736b2e5669657712110a09706167655f73" .
            "697a6518032001280512120a0a706167655f746f6b656e18042001280922" .
            "580a114c6973745461736b73526573706f6e7365122a0a057461736b7318" .
            "012003280b321b2e676f6f676c652e636c6f75642e7461736b732e76322e" .
            "5461736b12170a0f6e6578745f706167655f746f6b656e18022001280922" .
            "7f0a0e4765745461736b5265717565737412340a046e616d651801200128" .
            "094226e04102fa41200a1e636c6f75647461736b732e676f6f676c656170" .
            "69732e636f6d2f5461736b12370a0d726573706f6e73655f766965771802" .
            "2001280e32202e676f6f676c652e636c6f75642e7461736b732e76322e54" .
            "61736b2e5669657722b5010a114372656174655461736b52657175657374" .
            "12370a06706172656e741801200128094227e04102fa4121121f636c6f75" .
            "647461736b732e676f6f676c65617069732e636f6d2f5175657565122e0a" .
            "047461736b18022001280b321b2e676f6f676c652e636c6f75642e746173" .
            "6b732e76322e5461736b4203e0410212370a0d726573706f6e73655f7669" .
            "657718032001280e32202e676f6f676c652e636c6f75642e7461736b732e" .
            "76322e5461736b2e5669657722490a1144656c6574655461736b52657175" .
            "65737412340a046e616d651801200128094226e04102fa41200a1e636c6f" .
            "75647461736b732e676f6f676c65617069732e636f6d2f5461736b227f0a" .
            "0e52756e5461736b5265717565737412340a046e616d6518012001280942" .
            "26e04102fa41200a1e636c6f75647461736b732e676f6f676c6561706973" .
            "2e636f6d2f5461736b12370a0d726573706f6e73655f7669657718022001" .
            "280e32202e676f6f676c652e636c6f75642e7461736b732e76322e546173" .
            "6b2e5669657732dd140a0a436c6f75645461736b73129e010a0a4c697374" .
            "51756575657312282e676f6f676c652e636c6f75642e7461736b732e7632" .
            "2e4c697374517565756573526571756573741a292e676f6f676c652e636c" .
            "6f75642e7461736b732e76322e4c697374517565756573526573706f6e73" .
            "65223b82d3e493022c122a2f76322f7b706172656e743d70726f6a656374" .
            "732f2a2f6c6f636174696f6e732f2a7d2f717565756573da410670617265" .
            "6e74128b010a08476574517565756512262e676f6f676c652e636c6f7564" .
            "2e7461736b732e76322e4765745175657565526571756573741a1c2e676f" .
            "6f676c652e636c6f75642e7461736b732e76322e5175657565223982d3e4" .
            "93022c122a2f76322f7b6e616d653d70726f6a656374732f2a2f6c6f6361" .
            "74696f6e732f2a2f7175657565732f2a7dda41046e616d6512a0010a0b43" .
            "7265617465517565756512292e676f6f676c652e636c6f75642e7461736b" .
            "732e76322e4372656174655175657565526571756573741a1c2e676f6f67" .
            "6c652e636c6f75642e7461736b732e76322e5175657565224882d3e49302" .
            "33222a2f76322f7b706172656e743d70726f6a656374732f2a2f6c6f6361" .
            "74696f6e732f2a7d2f7175657565733a057175657565da410c706172656e" .
            "742c717565756512ab010a0b557064617465517565756512292e676f6f67" .
            "6c652e636c6f75642e7461736b732e76322e557064617465517565756552" .
            "6571756573741a1c2e676f6f676c652e636c6f75642e7461736b732e7632" .
            "2e5175657565225382d3e493023932302f76322f7b71756575652e6e616d" .
            "653d70726f6a656374732f2a2f6c6f636174696f6e732f2a2f7175657565" .
            "732f2a7d3a057175657565da411171756575652c7570646174655f6d6173" .
            "6b128b010a0b44656c657465517565756512292e676f6f676c652e636c6f" .
            "75642e7461736b732e76322e44656c657465517565756552657175657374" .
            "1a162e676f6f676c652e70726f746f6275662e456d707479223982d3e493" .
            "022c2a2a2f76322f7b6e616d653d70726f6a656374732f2a2f6c6f636174" .
            "696f6e732f2a2f7175657565732f2a7dda41046e616d651298010a0a5075" .
            "726765517565756512282e676f6f676c652e636c6f75642e7461736b732e" .
            "76322e50757267655175657565526571756573741a1c2e676f6f676c652e" .
            "636c6f75642e7461736b732e76322e5175657565224282d3e49302352230" .
            "2f76322f7b6e616d653d70726f6a656374732f2a2f6c6f636174696f6e73" .
            "2f2a2f7175657565732f2a7d3a70757267653a012ada41046e616d651298" .
            "010a0a5061757365517565756512282e676f6f676c652e636c6f75642e74" .
            "61736b732e76322e50617573655175657565526571756573741a1c2e676f" .
            "6f676c652e636c6f75642e7461736b732e76322e5175657565224282d3e4" .
            "93023522302f76322f7b6e616d653d70726f6a656374732f2a2f6c6f6361" .
            "74696f6e732f2a2f7175657565732f2a7d3a70617573653a012ada41046e" .
            "616d65129b010a0b526573756d65517565756512292e676f6f676c652e63" .
            "6c6f75642e7461736b732e76322e526573756d6551756575655265717565" .
            "73741a1c2e676f6f676c652e636c6f75642e7461736b732e76322e517565" .
            "7565224382d3e493023622312f76322f7b6e616d653d70726f6a65637473" .
            "2f2a2f6c6f636174696f6e732f2a2f7175657565732f2a7d3a726573756d" .
            "653a012ada41046e616d65129c010a0c47657449616d506f6c6963791222" .
            "2e676f6f676c652e69616d2e76312e47657449616d506f6c696379526571" .
            "756573741a152e676f6f676c652e69616d2e76312e506f6c696379225182" .
            "d3e4930240223b2f76322f7b7265736f757263653d70726f6a656374732f" .
            "2a2f6c6f636174696f6e732f2a2f7175657565732f2a7d3a67657449616d" .
            "506f6c6963793a012ada41087265736f7572636512a3010a0c5365744961" .
            "6d506f6c69637912222e676f6f676c652e69616d2e76312e53657449616d" .
            "506f6c696379526571756573741a152e676f6f676c652e69616d2e76312e" .
            "506f6c696379225882d3e4930240223b2f76322f7b7265736f757263653d" .
            "70726f6a656374732f2a2f6c6f636174696f6e732f2a2f7175657565732f" .
            "2a7d3a73657449616d506f6c6963793a012ada410f7265736f757263652c" .
            "706f6c69637912ce010a125465737449616d5065726d697373696f6e7312" .
            "282e676f6f676c652e69616d2e76312e5465737449616d5065726d697373" .
            "696f6e73526571756573741a292e676f6f676c652e69616d2e76312e5465" .
            "737449616d5065726d697373696f6e73526573706f6e7365226382d3e493" .
            "024622412f76322f7b7265736f757263653d70726f6a656374732f2a2f6c" .
            "6f636174696f6e732f2a2f7175657565732f2a7d3a7465737449616d5065" .
            "726d697373696f6e733a012ada41147265736f757263652c7065726d6973" .
            "73696f6e7312a3010a094c6973745461736b7312272e676f6f676c652e63" .
            "6c6f75642e7461736b732e76322e4c6973745461736b7352657175657374" .
            "1a282e676f6f676c652e636c6f75642e7461736b732e76322e4c69737454" .
            "61736b73526573706f6e7365224382d3e493023412322f76322f7b706172" .
            "656e743d70726f6a656374732f2a2f6c6f636174696f6e732f2a2f717565" .
            "7565732f2a7d2f7461736b73da4106706172656e741290010a0747657454" .
            "61736b12252e676f6f676c652e636c6f75642e7461736b732e76322e4765" .
            "745461736b526571756573741a1b2e676f6f676c652e636c6f75642e7461" .
            "736b732e76322e5461736b224182d3e493023412322f76322f7b6e616d65" .
            "3d70726f6a656374732f2a2f6c6f636174696f6e732f2a2f717565756573" .
            "2f2a2f7461736b732f2a7dda41046e616d6512a0010a0a43726561746554" .
            "61736b12282e676f6f676c652e636c6f75642e7461736b732e76322e4372" .
            "656174655461736b526571756573741a1b2e676f6f676c652e636c6f7564" .
            "2e7461736b732e76322e5461736b224b82d3e493023722322f76322f7b70" .
            "6172656e743d70726f6a656374732f2a2f6c6f636174696f6e732f2a2f71" .
            "75657565732f2a7d2f7461736b733a012ada410b706172656e742c746173" .
            "6b1291010a0a44656c6574655461736b12282e676f6f676c652e636c6f75" .
            "642e7461736b732e76322e44656c6574655461736b526571756573741a16" .
            "2e676f6f676c652e70726f746f6275662e456d707479224182d3e4930234" .
            "2a322f76322f7b6e616d653d70726f6a656374732f2a2f6c6f636174696f" .
            "6e732f2a2f7175657565732f2a2f7461736b732f2a7dda41046e616d6512" .
            "97010a0752756e5461736b12252e676f6f676c652e636c6f75642e746173" .
            "6b732e76322e52756e5461736b526571756573741a1b2e676f6f676c652e" .
            "636c6f75642e7461736b732e76322e5461736b224882d3e493023b22362f" .
            "76322f7b6e616d653d70726f6a656374732f2a2f6c6f636174696f6e732f" .
            "2a2f7175657565732f2a2f7461736b732f2a7d3a72756e3a012ada41046e" .
            "616d651a4dca4119636c6f75647461736b732e676f6f676c65617069732e" .
            "636f6dd2412e68747470733a2f2f7777772e676f6f676c65617069732e63" .
            "6f6d2f617574682f636c6f75642d706c6174666f726d42720a19636f6d2e" .
            "676f6f676c652e636c6f75642e7461736b732e7632420f436c6f75645461" .
            "736b7350726f746f50015a3a676f6f676c652e676f6c616e672e6f72672f" .
            "67656e70726f746f2f676f6f676c65617069732f636c6f75642f7461736b" .
            "732f76323b7461736b73a202055441534b53620670726f746f33"
        ), true);

        static::$is_initialized = true;
    }
}
