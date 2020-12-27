<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/cloud/talent/v4beta1/job_service.proto

namespace Google\Cloud\Talent\V4beta1;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Output only.
 * Response for SearchJob method.
 *
 * Generated from protobuf message <code>google.cloud.talent.v4beta1.SearchJobsResponse</code>
 */
class SearchJobsResponse extends \Google\Protobuf\Internal\Message
{
    /**
     * The Job entities that match the specified
     * [SearchJobsRequest][google.cloud.talent.v4beta1.SearchJobsRequest].
     *
     * Generated from protobuf field <code>repeated .google.cloud.talent.v4beta1.SearchJobsResponse.MatchingJob matching_jobs = 1;</code>
     */
    private $matching_jobs;
    /**
     * The histogram results that match with specified
     * [SearchJobsRequest.histogram_queries][google.cloud.talent.v4beta1.SearchJobsRequest.histogram_queries].
     *
     * Generated from protobuf field <code>repeated .google.cloud.talent.v4beta1.HistogramQueryResult histogram_query_results = 2;</code>
     */
    private $histogram_query_results;
    /**
     * The token that specifies the starting position of the next page of results.
     * This field is empty if there are no more results.
     *
     * Generated from protobuf field <code>string next_page_token = 3;</code>
     */
    private $next_page_token = '';
    /**
     * The location filters that the service applied to the specified query. If
     * any filters are lat-lng based, the
     * [Location.location_type][google.cloud.talent.v4beta1.Location.location_type]
     * is
     * [Location.LocationType.LOCATION_TYPE_UNSPECIFIED][google.cloud.talent.v4beta1.Location.LocationType.LOCATION_TYPE_UNSPECIFIED].
     *
     * Generated from protobuf field <code>repeated .google.cloud.talent.v4beta1.Location location_filters = 4;</code>
     */
    private $location_filters;
    /**
     * An estimation of the number of jobs that match the specified query.
     * This number isn't guaranteed to be accurate. For accurate results,
     * see
     * [SearchJobsRequest.require_precise_result_size][google.cloud.talent.v4beta1.SearchJobsRequest.require_precise_result_size].
     *
     * Generated from protobuf field <code>int32 estimated_total_size = 5;</code>
     */
    private $estimated_total_size = 0;
    /**
     * The precise result count, which is available only if the client set
     * [SearchJobsRequest.require_precise_result_size][google.cloud.talent.v4beta1.SearchJobsRequest.require_precise_result_size]
     * to `true`, or if the response is the last page of results. Otherwise, the
     * value is `-1`.
     *
     * Generated from protobuf field <code>int32 total_size = 6;</code>
     */
    private $total_size = 0;
    /**
     * Additional information for the API invocation, such as the request
     * tracking id.
     *
     * Generated from protobuf field <code>.google.cloud.talent.v4beta1.ResponseMetadata metadata = 7;</code>
     */
    private $metadata = null;
    /**
     * If query broadening is enabled, we may append additional results from the
     * broadened query. This number indicates how many of the jobs returned in the
     * jobs field are from the broadened query. These results are always at the
     * end of the jobs list. In particular, a value of 0, or if the field isn't
     * set, all the jobs in the jobs list are from the original
     * (without broadening) query. If this field is non-zero, subsequent requests
     * with offset after this result set should contain all broadened results.
     *
     * Generated from protobuf field <code>int32 broadened_query_jobs_count = 8;</code>
     */
    private $broadened_query_jobs_count = 0;
    /**
     * The spell checking result, and correction.
     *
     * Generated from protobuf field <code>.google.cloud.talent.v4beta1.SpellingCorrection spell_correction = 9;</code>
     */
    private $spell_correction = null;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type \Google\Cloud\Talent\V4beta1\SearchJobsResponse\MatchingJob[]|\Google\Protobuf\Internal\RepeatedField $matching_jobs
     *           The Job entities that match the specified
     *           [SearchJobsRequest][google.cloud.talent.v4beta1.SearchJobsRequest].
     *     @type \Google\Cloud\Talent\V4beta1\HistogramQueryResult[]|\Google\Protobuf\Internal\RepeatedField $histogram_query_results
     *           The histogram results that match with specified
     *           [SearchJobsRequest.histogram_queries][google.cloud.talent.v4beta1.SearchJobsRequest.histogram_queries].
     *     @type string $next_page_token
     *           The token that specifies the starting position of the next page of results.
     *           This field is empty if there are no more results.
     *     @type \Google\Cloud\Talent\V4beta1\Location[]|\Google\Protobuf\Internal\RepeatedField $location_filters
     *           The location filters that the service applied to the specified query. If
     *           any filters are lat-lng based, the
     *           [Location.location_type][google.cloud.talent.v4beta1.Location.location_type]
     *           is
     *           [Location.LocationType.LOCATION_TYPE_UNSPECIFIED][google.cloud.talent.v4beta1.Location.LocationType.LOCATION_TYPE_UNSPECIFIED].
     *     @type int $estimated_total_size
     *           An estimation of the number of jobs that match the specified query.
     *           This number isn't guaranteed to be accurate. For accurate results,
     *           see
     *           [SearchJobsRequest.require_precise_result_size][google.cloud.talent.v4beta1.SearchJobsRequest.require_precise_result_size].
     *     @type int $total_size
     *           The precise result count, which is available only if the client set
     *           [SearchJobsRequest.require_precise_result_size][google.cloud.talent.v4beta1.SearchJobsRequest.require_precise_result_size]
     *           to `true`, or if the response is the last page of results. Otherwise, the
     *           value is `-1`.
     *     @type \Google\Cloud\Talent\V4beta1\ResponseMetadata $metadata
     *           Additional information for the API invocation, such as the request
     *           tracking id.
     *     @type int $broadened_query_jobs_count
     *           If query broadening is enabled, we may append additional results from the
     *           broadened query. This number indicates how many of the jobs returned in the
     *           jobs field are from the broadened query. These results are always at the
     *           end of the jobs list. In particular, a value of 0, or if the field isn't
     *           set, all the jobs in the jobs list are from the original
     *           (without broadening) query. If this field is non-zero, subsequent requests
     *           with offset after this result set should contain all broadened results.
     *     @type \Google\Cloud\Talent\V4beta1\SpellingCorrection $spell_correction
     *           The spell checking result, and correction.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Cloud\Talent\V4Beta1\JobService::initOnce();
        parent::__construct($data);
    }

    /**
     * The Job entities that match the specified
     * [SearchJobsRequest][google.cloud.talent.v4beta1.SearchJobsRequest].
     *
     * Generated from protobuf field <code>repeated .google.cloud.talent.v4beta1.SearchJobsResponse.MatchingJob matching_jobs = 1;</code>
     * @return \Google\Protobuf\Internal\RepeatedField
     */
    public function getMatchingJobs()
    {
        return $this->matching_jobs;
    }

    /**
     * The Job entities that match the specified
     * [SearchJobsRequest][google.cloud.talent.v4beta1.SearchJobsRequest].
     *
     * Generated from protobuf field <code>repeated .google.cloud.talent.v4beta1.SearchJobsResponse.MatchingJob matching_jobs = 1;</code>
     * @param \Google\Cloud\Talent\V4beta1\SearchJobsResponse\MatchingJob[]|\Google\Protobuf\Internal\RepeatedField $var
     * @return $this
     */
    public function setMatchingJobs($var)
    {
        $arr = GPBUtil::checkRepeatedField($var, \Google\Protobuf\Internal\GPBType::MESSAGE, \Google\Cloud\Talent\V4beta1\SearchJobsResponse\MatchingJob::class);
        $this->matching_jobs = $arr;

        return $this;
    }

    /**
     * The histogram results that match with specified
     * [SearchJobsRequest.histogram_queries][google.cloud.talent.v4beta1.SearchJobsRequest.histogram_queries].
     *
     * Generated from protobuf field <code>repeated .google.cloud.talent.v4beta1.HistogramQueryResult histogram_query_results = 2;</code>
     * @return \Google\Protobuf\Internal\RepeatedField
     */
    public function getHistogramQueryResults()
    {
        return $this->histogram_query_results;
    }

    /**
     * The histogram results that match with specified
     * [SearchJobsRequest.histogram_queries][google.cloud.talent.v4beta1.SearchJobsRequest.histogram_queries].
     *
     * Generated from protobuf field <code>repeated .google.cloud.talent.v4beta1.HistogramQueryResult histogram_query_results = 2;</code>
     * @param \Google\Cloud\Talent\V4beta1\HistogramQueryResult[]|\Google\Protobuf\Internal\RepeatedField $var
     * @return $this
     */
    public function setHistogramQueryResults($var)
    {
        $arr = GPBUtil::checkRepeatedField($var, \Google\Protobuf\Internal\GPBType::MESSAGE, \Google\Cloud\Talent\V4beta1\HistogramQueryResult::class);
        $this->histogram_query_results = $arr;

        return $this;
    }

    /**
     * The token that specifies the starting position of the next page of results.
     * This field is empty if there are no more results.
     *
     * Generated from protobuf field <code>string next_page_token = 3;</code>
     * @return string
     */
    public function getNextPageToken()
    {
        return $this->next_page_token;
    }

    /**
     * The token that specifies the starting position of the next page of results.
     * This field is empty if there are no more results.
     *
     * Generated from protobuf field <code>string next_page_token = 3;</code>
     * @param string $var
     * @return $this
     */
    public function setNextPageToken($var)
    {
        GPBUtil::checkString($var, True);
        $this->next_page_token = $var;

        return $this;
    }

    /**
     * The location filters that the service applied to the specified query. If
     * any filters are lat-lng based, the
     * [Location.location_type][google.cloud.talent.v4beta1.Location.location_type]
     * is
     * [Location.LocationType.LOCATION_TYPE_UNSPECIFIED][google.cloud.talent.v4beta1.Location.LocationType.LOCATION_TYPE_UNSPECIFIED].
     *
     * Generated from protobuf field <code>repeated .google.cloud.talent.v4beta1.Location location_filters = 4;</code>
     * @return \Google\Protobuf\Internal\RepeatedField
     */
    public function getLocationFilters()
    {
        return $this->location_filters;
    }

    /**
     * The location filters that the service applied to the specified query. If
     * any filters are lat-lng based, the
     * [Location.location_type][google.cloud.talent.v4beta1.Location.location_type]
     * is
     * [Location.LocationType.LOCATION_TYPE_UNSPECIFIED][google.cloud.talent.v4beta1.Location.LocationType.LOCATION_TYPE_UNSPECIFIED].
     *
     * Generated from protobuf field <code>repeated .google.cloud.talent.v4beta1.Location location_filters = 4;</code>
     * @param \Google\Cloud\Talent\V4beta1\Location[]|\Google\Protobuf\Internal\RepeatedField $var
     * @return $this
     */
    public function setLocationFilters($var)
    {
        $arr = GPBUtil::checkRepeatedField($var, \Google\Protobuf\Internal\GPBType::MESSAGE, \Google\Cloud\Talent\V4beta1\Location::class);
        $this->location_filters = $arr;

        return $this;
    }

    /**
     * An estimation of the number of jobs that match the specified query.
     * This number isn't guaranteed to be accurate. For accurate results,
     * see
     * [SearchJobsRequest.require_precise_result_size][google.cloud.talent.v4beta1.SearchJobsRequest.require_precise_result_size].
     *
     * Generated from protobuf field <code>int32 estimated_total_size = 5;</code>
     * @return int
     */
    public function getEstimatedTotalSize()
    {
        return $this->estimated_total_size;
    }

    /**
     * An estimation of the number of jobs that match the specified query.
     * This number isn't guaranteed to be accurate. For accurate results,
     * see
     * [SearchJobsRequest.require_precise_result_size][google.cloud.talent.v4beta1.SearchJobsRequest.require_precise_result_size].
     *
     * Generated from protobuf field <code>int32 estimated_total_size = 5;</code>
     * @param int $var
     * @return $this
     */
    public function setEstimatedTotalSize($var)
    {
        GPBUtil::checkInt32($var);
        $this->estimated_total_size = $var;

        return $this;
    }

    /**
     * The precise result count, which is available only if the client set
     * [SearchJobsRequest.require_precise_result_size][google.cloud.talent.v4beta1.SearchJobsRequest.require_precise_result_size]
     * to `true`, or if the response is the last page of results. Otherwise, the
     * value is `-1`.
     *
     * Generated from protobuf field <code>int32 total_size = 6;</code>
     * @return int
     */
    public function getTotalSize()
    {
        return $this->total_size;
    }

    /**
     * The precise result count, which is available only if the client set
     * [SearchJobsRequest.require_precise_result_size][google.cloud.talent.v4beta1.SearchJobsRequest.require_precise_result_size]
     * to `true`, or if the response is the last page of results. Otherwise, the
     * value is `-1`.
     *
     * Generated from protobuf field <code>int32 total_size = 6;</code>
     * @param int $var
     * @return $this
     */
    public function setTotalSize($var)
    {
        GPBUtil::checkInt32($var);
        $this->total_size = $var;

        return $this;
    }

    /**
     * Additional information for the API invocation, such as the request
     * tracking id.
     *
     * Generated from protobuf field <code>.google.cloud.talent.v4beta1.ResponseMetadata metadata = 7;</code>
     * @return \Google\Cloud\Talent\V4beta1\ResponseMetadata
     */
    public function getMetadata()
    {
        return $this->metadata;
    }

    /**
     * Additional information for the API invocation, such as the request
     * tracking id.
     *
     * Generated from protobuf field <code>.google.cloud.talent.v4beta1.ResponseMetadata metadata = 7;</code>
     * @param \Google\Cloud\Talent\V4beta1\ResponseMetadata $var
     * @return $this
     */
    public function setMetadata($var)
    {
        GPBUtil::checkMessage($var, \Google\Cloud\Talent\V4beta1\ResponseMetadata::class);
        $this->metadata = $var;

        return $this;
    }

    /**
     * If query broadening is enabled, we may append additional results from the
     * broadened query. This number indicates how many of the jobs returned in the
     * jobs field are from the broadened query. These results are always at the
     * end of the jobs list. In particular, a value of 0, or if the field isn't
     * set, all the jobs in the jobs list are from the original
     * (without broadening) query. If this field is non-zero, subsequent requests
     * with offset after this result set should contain all broadened results.
     *
     * Generated from protobuf field <code>int32 broadened_query_jobs_count = 8;</code>
     * @return int
     */
    public function getBroadenedQueryJobsCount()
    {
        return $this->broadened_query_jobs_count;
    }

    /**
     * If query broadening is enabled, we may append additional results from the
     * broadened query. This number indicates how many of the jobs returned in the
     * jobs field are from the broadened query. These results are always at the
     * end of the jobs list. In particular, a value of 0, or if the field isn't
     * set, all the jobs in the jobs list are from the original
     * (without broadening) query. If this field is non-zero, subsequent requests
     * with offset after this result set should contain all broadened results.
     *
     * Generated from protobuf field <code>int32 broadened_query_jobs_count = 8;</code>
     * @param int $var
     * @return $this
     */
    public function setBroadenedQueryJobsCount($var)
    {
        GPBUtil::checkInt32($var);
        $this->broadened_query_jobs_count = $var;

        return $this;
    }

    /**
     * The spell checking result, and correction.
     *
     * Generated from protobuf field <code>.google.cloud.talent.v4beta1.SpellingCorrection spell_correction = 9;</code>
     * @return \Google\Cloud\Talent\V4beta1\SpellingCorrection
     */
    public function getSpellCorrection()
    {
        return $this->spell_correction;
    }

    /**
     * The spell checking result, and correction.
     *
     * Generated from protobuf field <code>.google.cloud.talent.v4beta1.SpellingCorrection spell_correction = 9;</code>
     * @param \Google\Cloud\Talent\V4beta1\SpellingCorrection $var
     * @return $this
     */
    public function setSpellCorrection($var)
    {
        GPBUtil::checkMessage($var, \Google\Cloud\Talent\V4beta1\SpellingCorrection::class);
        $this->spell_correction = $var;

        return $this;
    }

}

