<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/cloud/dataproc/v1/clusters.proto

namespace GPBMetadata\Google\Cloud\Dataproc\V1;

class Clusters
{
    public static $is_initialized = false;

    public static function initOnce() {
        $pool = \Google\Protobuf\Internal\DescriptorPool::getGeneratedPool();

        if (static::$is_initialized == true) {
          return;
        }
        \GPBMetadata\Google\Api\Annotations::initOnce();
        \GPBMetadata\Google\Cloud\Dataproc\V1\Operations::initOnce();
        \GPBMetadata\Google\Cloud\Dataproc\V1\Shared::initOnce();
        \GPBMetadata\Google\Longrunning\Operations::initOnce();
        \GPBMetadata\Google\Protobuf\Duration::initOnce();
        \GPBMetadata\Google\Protobuf\FieldMask::initOnce();
        \GPBMetadata\Google\Protobuf\Timestamp::initOnce();
        $pool->internalAddGeneratedFile(hex2bin(
            "0af8290a27676f6f676c652f636c6f75642f6461746170726f632f76312f" .
            "636c7573746572732e70726f746f1218676f6f676c652e636c6f75642e64" .
            "61746170726f632e76311a29676f6f676c652f636c6f75642f6461746170" .
            "726f632f76312f6f7065726174696f6e732e70726f746f1a25676f6f676c" .
            "652f636c6f75642f6461746170726f632f76312f7368617265642e70726f" .
            "746f1a23676f6f676c652f6c6f6e6772756e6e696e672f6f706572617469" .
            "6f6e732e70726f746f1a1e676f6f676c652f70726f746f6275662f647572" .
            "6174696f6e2e70726f746f1a20676f6f676c652f70726f746f6275662f66" .
            "69656c645f6d61736b2e70726f746f1a1f676f6f676c652f70726f746f62" .
            "75662f74696d657374616d702e70726f746f22a5030a07436c7573746572" .
            "12120a0a70726f6a6563745f696418012001280912140a0c636c75737465" .
            "725f6e616d6518022001280912370a06636f6e66696718032001280b3227" .
            "2e676f6f676c652e636c6f75642e6461746170726f632e76312e436c7573" .
            "746572436f6e666967123d0a066c6162656c7318082003280b322d2e676f" .
            "6f676c652e636c6f75642e6461746170726f632e76312e436c7573746572" .
            "2e4c6162656c73456e74727912370a0673746174757318042001280b3227" .
            "2e676f6f676c652e636c6f75642e6461746170726f632e76312e436c7573" .
            "746572537461747573123f0a0e7374617475735f686973746f7279180720" .
            "03280b32272e676f6f676c652e636c6f75642e6461746170726f632e7631" .
            "2e436c757374657253746174757312140a0c636c75737465725f75756964" .
            "18062001280912390a076d65747269637318092001280b32282e676f6f67" .
            "6c652e636c6f75642e6461746170726f632e76312e436c75737465724d65" .
            "74726963731a2d0a0b4c6162656c73456e747279120b0a036b6579180120" .
            "012809120d0a0576616c75651802200128093a02380122a8040a0d436c75" .
            "73746572436f6e66696712150a0d636f6e6669675f6275636b6574180120" .
            "01280912460a126763655f636c75737465725f636f6e6669671808200128" .
            "0b322a2e676f6f676c652e636c6f75642e6461746170726f632e76312e47" .
            "6365436c7573746572436f6e66696712440a0d6d61737465725f636f6e66" .
            "696718092001280b322d2e676f6f676c652e636c6f75642e646174617072" .
            "6f632e76312e496e7374616e636547726f7570436f6e66696712440a0d77" .
            "6f726b65725f636f6e666967180a2001280b322d2e676f6f676c652e636c" .
            "6f75642e6461746170726f632e76312e496e7374616e636547726f757043" .
            "6f6e666967124e0a177365636f6e646172795f776f726b65725f636f6e66" .
            "6967180c2001280b322d2e676f6f676c652e636c6f75642e646174617072" .
            "6f632e76312e496e7374616e636547726f7570436f6e66696712410a0f73" .
            "6f6674776172655f636f6e666967180d2001280b32282e676f6f676c652e" .
            "636c6f75642e6461746170726f632e76312e536f667477617265436f6e66" .
            "696712520a16696e697469616c697a6174696f6e5f616374696f6e73180b" .
            "2003280b32322e676f6f676c652e636c6f75642e6461746170726f632e76" .
            "312e4e6f6465496e697469616c697a6174696f6e416374696f6e12450a11" .
            "656e6372797074696f6e5f636f6e666967180f2001280b322a2e676f6f67" .
            "6c652e636c6f75642e6461746170726f632e76312e456e6372797074696f" .
            "6e436f6e666967222f0a10456e6372797074696f6e436f6e666967121b0a" .
            "136763655f70645f6b6d735f6b65795f6e616d6518012001280922af020a" .
            "10476365436c7573746572436f6e66696712100a087a6f6e655f75726918" .
            "012001280912130a0b6e6574776f726b5f75726918022001280912160a0e" .
            "7375626e6574776f726b5f75726918062001280912180a10696e7465726e" .
            "616c5f69705f6f6e6c7918072001280812170a0f736572766963655f6163" .
            "636f756e74180820012809121e0a16736572766963655f6163636f756e74" .
            "5f73636f706573180320032809120c0a0474616773180420032809124a0a" .
            "086d6574616461746118052003280b32382e676f6f676c652e636c6f7564" .
            "2e6461746170726f632e76312e476365436c7573746572436f6e6669672e" .
            "4d65746164617461456e7472791a2f0a0d4d65746164617461456e747279" .
            "120b0a036b6579180120012809120d0a0576616c75651802200128093a02" .
            "380122d3020a13496e7374616e636547726f7570436f6e66696712150a0d" .
            "6e756d5f696e7374616e63657318012001280512160a0e696e7374616e63" .
            "655f6e616d657318022003280912110a09696d6167655f75726918032001" .
            "280912180a106d616368696e655f747970655f7572691804200128091239" .
            "0a0b6469736b5f636f6e66696718052001280b32242e676f6f676c652e63" .
            "6c6f75642e6461746170726f632e76312e4469736b436f6e66696712160a" .
            "0e69735f707265656d707469626c65180620012808124a0a146d616e6167" .
            "65645f67726f75705f636f6e66696718072001280b322c2e676f6f676c65" .
            "2e636c6f75642e6461746170726f632e76312e4d616e6167656447726f75" .
            "70436f6e66696712410a0c616363656c657261746f727318082003280b32" .
            "2b2e676f6f676c652e636c6f75642e6461746170726f632e76312e416363" .
            "656c657261746f72436f6e66696722590a124d616e6167656447726f7570" .
            "436f6e666967121e0a16696e7374616e63655f74656d706c6174655f6e61" .
            "6d6518012001280912230a1b696e7374616e63655f67726f75705f6d616e" .
            "616765725f6e616d65180220012809224c0a11416363656c657261746f72" .
            "436f6e666967121c0a14616363656c657261746f725f747970655f757269" .
            "18012001280912190a11616363656c657261746f725f636f756e74180220" .
            "01280522570a0a4469736b436f6e66696712160a0e626f6f745f6469736b" .
            "5f7479706518032001280912190a11626f6f745f6469736b5f73697a655f" .
            "676218012001280512160a0e6e756d5f6c6f63616c5f7373647318022001" .
            "280522690a184e6f6465496e697469616c697a6174696f6e416374696f6e" .
            "12170a0f65786563757461626c655f66696c6518012001280912340a1165" .
            "7865637574696f6e5f74696d656f757418022001280b32192e676f6f676c" .
            "652e70726f746f6275662e4475726174696f6e22ed020a0d436c75737465" .
            "72537461747573123c0a05737461746518012001280e322d2e676f6f676c" .
            "652e636c6f75642e6461746170726f632e76312e436c7573746572537461" .
            "7475732e5374617465120e0a0664657461696c18022001280912340a1073" .
            "746174655f73746172745f74696d6518032001280b321a2e676f6f676c65" .
            "2e70726f746f6275662e54696d657374616d7012420a0873756273746174" .
            "6518042001280e32302e676f6f676c652e636c6f75642e6461746170726f" .
            "632e76312e436c75737465725374617475732e537562737461746522560a" .
            "055374617465120b0a07554e4b4e4f574e1000120c0a084352454154494e" .
            "471001120b0a0752554e4e494e47100212090a054552524f521003120c0a" .
            "0844454c4554494e471004120c0a085550444154494e471005223c0a0853" .
            "75627374617465120f0a0b554e5350454349464945441000120d0a09554e" .
            "4845414c544859100112100a0c5354414c455f535441545553100222ea01" .
            "0a0e536f667477617265436f6e66696712150a0d696d6167655f76657273" .
            "696f6e180120012809124c0a0a70726f7065727469657318022003280b32" .
            "382e676f6f676c652e636c6f75642e6461746170726f632e76312e536f66" .
            "7477617265436f6e6669672e50726f70657274696573456e74727912400a" .
            "136f7074696f6e616c5f636f6d706f6e656e747318032003280e32232e67" .
            "6f6f676c652e636c6f75642e6461746170726f632e76312e436f6d706f6e" .
            "656e741a310a0f50726f70657274696573456e747279120b0a036b657918" .
            "0120012809120d0a0576616c75651802200128093a023801229a020a0e43" .
            "6c75737465724d657472696373124f0a0c686466735f6d65747269637318" .
            "012003280b32392e676f6f676c652e636c6f75642e6461746170726f632e" .
            "76312e436c75737465724d6574726963732e486466734d65747269637345" .
            "6e747279124f0a0c7961726e5f6d65747269637318022003280b32392e67" .
            "6f6f676c652e636c6f75642e6461746170726f632e76312e436c75737465" .
            "724d6574726963732e5961726e4d657472696373456e7472791a320a1048" .
            "6466734d657472696373456e747279120b0a036b6579180120012809120d" .
            "0a0576616c75651802200128033a0238011a320a105961726e4d65747269" .
            "6373456e747279120b0a036b6579180120012809120d0a0576616c756518" .
            "02200128033a0238012282010a14437265617465436c7573746572526571" .
            "7565737412120a0a70726f6a6563745f6964180120012809120e0a067265" .
            "67696f6e18032001280912320a07636c757374657218022001280b32212e" .
            "676f6f676c652e636c6f75642e6461746170726f632e76312e436c757374" .
            "657212120a0a726571756573745f6964180420012809228b020a14557064" .
            "617465436c75737465725265717565737412120a0a70726f6a6563745f69" .
            "64180120012809120e0a06726567696f6e18052001280912140a0c636c75" .
            "737465725f6e616d6518022001280912320a07636c757374657218032001" .
            "280b32212e676f6f676c652e636c6f75642e6461746170726f632e76312e" .
            "436c757374657212400a1d677261636566756c5f6465636f6d6d69737369" .
            "6f6e5f74696d656f757418062001280b32192e676f6f676c652e70726f74" .
            "6f6275662e4475726174696f6e122f0a0b7570646174655f6d61736b1804" .
            "2001280b321a2e676f6f676c652e70726f746f6275662e4669656c644d61" .
            "736b12120a0a726571756573745f6964180720012809227a0a1444656c65" .
            "7465436c75737465725265717565737412120a0a70726f6a6563745f6964" .
            "180120012809120e0a06726567696f6e18032001280912140a0c636c7573" .
            "7465725f6e616d6518022001280912140a0c636c75737465725f75756964" .
            "18042001280912120a0a726571756573745f6964180520012809224d0a11" .
            "476574436c75737465725265717565737412120a0a70726f6a6563745f69" .
            "64180120012809120e0a06726567696f6e18032001280912140a0c636c75" .
            "737465725f6e616d6518022001280922700a134c697374436c7573746572" .
            "735265717565737412120a0a70726f6a6563745f6964180120012809120e" .
            "0a06726567696f6e180420012809120e0a0666696c746572180520012809" .
            "12110a09706167655f73697a6518022001280512120a0a706167655f746f" .
            "6b656e18032001280922640a144c697374436c757374657273526573706f" .
            "6e736512330a08636c75737465727318012003280b32212e676f6f676c65" .
            "2e636c6f75642e6461746170726f632e76312e436c757374657212170a0f" .
            "6e6578745f706167655f746f6b656e18022001280922520a16446961676e" .
            "6f7365436c75737465725265717565737412120a0a70726f6a6563745f69" .
            "64180120012809120e0a06726567696f6e18032001280912140a0c636c75" .
            "737465725f6e616d65180220012809222c0a16446961676e6f7365436c75" .
            "73746572526573756c747312120a0a6f75747075745f7572691801200128" .
            "0932b2080a11436c7573746572436f6e74726f6c6c657212a4010a0d4372" .
            "65617465436c7573746572122e2e676f6f676c652e636c6f75642e646174" .
            "6170726f632e76312e437265617465436c7573746572526571756573741a" .
            "1d2e676f6f676c652e6c6f6e6772756e6e696e672e4f7065726174696f6e" .
            "224482d3e493023e22332f76312f70726f6a656374732f7b70726f6a6563" .
            "745f69647d2f726567696f6e732f7b726567696f6e7d2f636c7573746572" .
            "733a07636c757374657212b3010a0d557064617465436c7573746572122e" .
            "2e676f6f676c652e636c6f75642e6461746170726f632e76312e55706461" .
            "7465436c7573746572526571756573741a1d2e676f6f676c652e6c6f6e67" .
            "72756e6e696e672e4f7065726174696f6e225382d3e493024d32422f7631" .
            "2f70726f6a656374732f7b70726f6a6563745f69647d2f726567696f6e73" .
            "2f7b726567696f6e7d2f636c7573746572732f7b636c75737465725f6e61" .
            "6d657d3a07636c757374657212aa010a0d44656c657465436c7573746572" .
            "122e2e676f6f676c652e636c6f75642e6461746170726f632e76312e4465" .
            "6c657465436c7573746572526571756573741a1d2e676f6f676c652e6c6f" .
            "6e6772756e6e696e672e4f7065726174696f6e224a82d3e49302442a422f" .
            "76312f70726f6a656374732f7b70726f6a6563745f69647d2f726567696f" .
            "6e732f7b726567696f6e7d2f636c7573746572732f7b636c75737465725f" .
            "6e616d657d12a8010a0a476574436c7573746572122b2e676f6f676c652e" .
            "636c6f75642e6461746170726f632e76312e476574436c75737465725265" .
            "71756573741a212e676f6f676c652e636c6f75642e6461746170726f632e" .
            "76312e436c7573746572224a82d3e493024412422f76312f70726f6a6563" .
            "74732f7b70726f6a6563745f69647d2f726567696f6e732f7b726567696f" .
            "6e7d2f636c7573746572732f7b636c75737465725f6e616d657d12aa010a" .
            "0c4c697374436c757374657273122d2e676f6f676c652e636c6f75642e64" .
            "61746170726f632e76312e4c697374436c75737465727352657175657374" .
            "1a2e2e676f6f676c652e636c6f75642e6461746170726f632e76312e4c69" .
            "7374436c757374657273526573706f6e7365223b82d3e493023512332f76" .
            "312f70726f6a656374732f7b70726f6a6563745f69647d2f726567696f6e" .
            "732f7b726567696f6e7d2f636c75737465727312ba010a0f446961676e6f" .
            "7365436c757374657212302e676f6f676c652e636c6f75642e6461746170" .
            "726f632e76312e446961676e6f7365436c7573746572526571756573741a" .
            "1d2e676f6f676c652e6c6f6e6772756e6e696e672e4f7065726174696f6e" .
            "225682d3e4930250224b2f76312f70726f6a656374732f7b70726f6a6563" .
            "745f69647d2f726567696f6e732f7b726567696f6e7d2f636c7573746572" .
            "732f7b636c75737465725f6e616d657d3a646961676e6f73653a012a4271" .
            "0a1c636f6d2e676f6f676c652e636c6f75642e6461746170726f632e7631" .
            "420d436c75737465727350726f746f50015a40676f6f676c652e676f6c61" .
            "6e672e6f72672f67656e70726f746f2f676f6f676c65617069732f636c6f" .
            "75642f6461746170726f632f76313b6461746170726f63620670726f746f" .
            "33"
        ), true);

        static::$is_initialized = true;
    }
}
