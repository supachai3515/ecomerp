<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/cloud/talent/v4beta1/common.proto

namespace Google\Cloud\Talent\V4beta1;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Output only.
 * Metadata used for long running operations returned by CTS batch APIs.
 * It's used to replace
 * [google.longrunning.Operation.metadata][google.longrunning.Operation.metadata].
 *
 * Generated from protobuf message <code>google.cloud.talent.v4beta1.BatchOperationMetadata</code>
 */
class BatchOperationMetadata extends \Google\Protobuf\Internal\Message
{
    /**
     * The state of a long running operation.
     *
     * Generated from protobuf field <code>.google.cloud.talent.v4beta1.BatchOperationMetadata.State state = 1;</code>
     */
    private $state = 0;
    /**
     * More detailed information about operation state.
     *
     * Generated from protobuf field <code>string state_description = 2;</code>
     */
    private $state_description = '';
    /**
     * Count of successful item(s) inside an operation.
     *
     * Generated from protobuf field <code>int32 success_count = 3;</code>
     */
    private $success_count = 0;
    /**
     * Count of failed item(s) inside an operation.
     *
     * Generated from protobuf field <code>int32 failure_count = 4;</code>
     */
    private $failure_count = 0;
    /**
     * Count of total item(s) inside an operation.
     *
     * Generated from protobuf field <code>int32 total_count = 5;</code>
     */
    private $total_count = 0;
    /**
     * The time when the batch operation is created.
     *
     * Generated from protobuf field <code>.google.protobuf.Timestamp create_time = 6;</code>
     */
    private $create_time = null;
    /**
     * The time when the batch operation status is updated. The metadata and the
     * [update_time][google.cloud.talent.v4beta1.BatchOperationMetadata.update_time]
     * is refreshed every minute otherwise cached data is returned.
     *
     * Generated from protobuf field <code>.google.protobuf.Timestamp update_time = 7;</code>
     */
    private $update_time = null;
    /**
     * The time when the batch operation is finished and
     * [google.longrunning.Operation.done][google.longrunning.Operation.done] is
     * set to `true`.
     *
     * Generated from protobuf field <code>.google.protobuf.Timestamp end_time = 8;</code>
     */
    private $end_time = null;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type int $state
     *           The state of a long running operation.
     *     @type string $state_description
     *           More detailed information about operation state.
     *     @type int $success_count
     *           Count of successful item(s) inside an operation.
     *     @type int $failure_count
     *           Count of failed item(s) inside an operation.
     *     @type int $total_count
     *           Count of total item(s) inside an operation.
     *     @type \Google\Protobuf\Timestamp $create_time
     *           The time when the batch operation is created.
     *     @type \Google\Protobuf\Timestamp $update_time
     *           The time when the batch operation status is updated. The metadata and the
     *           [update_time][google.cloud.talent.v4beta1.BatchOperationMetadata.update_time]
     *           is refreshed every minute otherwise cached data is returned.
     *     @type \Google\Protobuf\Timestamp $end_time
     *           The time when the batch operation is finished and
     *           [google.longrunning.Operation.done][google.longrunning.Operation.done] is
     *           set to `true`.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Cloud\Talent\V4Beta1\Common::initOnce();
        parent::__construct($data);
    }

    /**
     * The state of a long running operation.
     *
     * Generated from protobuf field <code>.google.cloud.talent.v4beta1.BatchOperationMetadata.State state = 1;</code>
     * @return int
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * The state of a long running operation.
     *
     * Generated from protobuf field <code>.google.cloud.talent.v4beta1.BatchOperationMetadata.State state = 1;</code>
     * @param int $var
     * @return $this
     */
    public function setState($var)
    {
        GPBUtil::checkEnum($var, \Google\Cloud\Talent\V4beta1\BatchOperationMetadata_State::class);
        $this->state = $var;

        return $this;
    }

    /**
     * More detailed information about operation state.
     *
     * Generated from protobuf field <code>string state_description = 2;</code>
     * @return string
     */
    public function getStateDescription()
    {
        return $this->state_description;
    }

    /**
     * More detailed information about operation state.
     *
     * Generated from protobuf field <code>string state_description = 2;</code>
     * @param string $var
     * @return $this
     */
    public function setStateDescription($var)
    {
        GPBUtil::checkString($var, True);
        $this->state_description = $var;

        return $this;
    }

    /**
     * Count of successful item(s) inside an operation.
     *
     * Generated from protobuf field <code>int32 success_count = 3;</code>
     * @return int
     */
    public function getSuccessCount()
    {
        return $this->success_count;
    }

    /**
     * Count of successful item(s) inside an operation.
     *
     * Generated from protobuf field <code>int32 success_count = 3;</code>
     * @param int $var
     * @return $this
     */
    public function setSuccessCount($var)
    {
        GPBUtil::checkInt32($var);
        $this->success_count = $var;

        return $this;
    }

    /**
     * Count of failed item(s) inside an operation.
     *
     * Generated from protobuf field <code>int32 failure_count = 4;</code>
     * @return int
     */
    public function getFailureCount()
    {
        return $this->failure_count;
    }

    /**
     * Count of failed item(s) inside an operation.
     *
     * Generated from protobuf field <code>int32 failure_count = 4;</code>
     * @param int $var
     * @return $this
     */
    public function setFailureCount($var)
    {
        GPBUtil::checkInt32($var);
        $this->failure_count = $var;

        return $this;
    }

    /**
     * Count of total item(s) inside an operation.
     *
     * Generated from protobuf field <code>int32 total_count = 5;</code>
     * @return int
     */
    public function getTotalCount()
    {
        return $this->total_count;
    }

    /**
     * Count of total item(s) inside an operation.
     *
     * Generated from protobuf field <code>int32 total_count = 5;</code>
     * @param int $var
     * @return $this
     */
    public function setTotalCount($var)
    {
        GPBUtil::checkInt32($var);
        $this->total_count = $var;

        return $this;
    }

    /**
     * The time when the batch operation is created.
     *
     * Generated from protobuf field <code>.google.protobuf.Timestamp create_time = 6;</code>
     * @return \Google\Protobuf\Timestamp
     */
    public function getCreateTime()
    {
        return $this->create_time;
    }

    /**
     * The time when the batch operation is created.
     *
     * Generated from protobuf field <code>.google.protobuf.Timestamp create_time = 6;</code>
     * @param \Google\Protobuf\Timestamp $var
     * @return $this
     */
    public function setCreateTime($var)
    {
        GPBUtil::checkMessage($var, \Google\Protobuf\Timestamp::class);
        $this->create_time = $var;

        return $this;
    }

    /**
     * The time when the batch operation status is updated. The metadata and the
     * [update_time][google.cloud.talent.v4beta1.BatchOperationMetadata.update_time]
     * is refreshed every minute otherwise cached data is returned.
     *
     * Generated from protobuf field <code>.google.protobuf.Timestamp update_time = 7;</code>
     * @return \Google\Protobuf\Timestamp
     */
    public function getUpdateTime()
    {
        return $this->update_time;
    }

    /**
     * The time when the batch operation status is updated. The metadata and the
     * [update_time][google.cloud.talent.v4beta1.BatchOperationMetadata.update_time]
     * is refreshed every minute otherwise cached data is returned.
     *
     * Generated from protobuf field <code>.google.protobuf.Timestamp update_time = 7;</code>
     * @param \Google\Protobuf\Timestamp $var
     * @return $this
     */
    public function setUpdateTime($var)
    {
        GPBUtil::checkMessage($var, \Google\Protobuf\Timestamp::class);
        $this->update_time = $var;

        return $this;
    }

    /**
     * The time when the batch operation is finished and
     * [google.longrunning.Operation.done][google.longrunning.Operation.done] is
     * set to `true`.
     *
     * Generated from protobuf field <code>.google.protobuf.Timestamp end_time = 8;</code>
     * @return \Google\Protobuf\Timestamp
     */
    public function getEndTime()
    {
        return $this->end_time;
    }

    /**
     * The time when the batch operation is finished and
     * [google.longrunning.Operation.done][google.longrunning.Operation.done] is
     * set to `true`.
     *
     * Generated from protobuf field <code>.google.protobuf.Timestamp end_time = 8;</code>
     * @param \Google\Protobuf\Timestamp $var
     * @return $this
     */
    public function setEndTime($var)
    {
        GPBUtil::checkMessage($var, \Google\Protobuf\Timestamp::class);
        $this->end_time = $var;

        return $this;
    }

}

