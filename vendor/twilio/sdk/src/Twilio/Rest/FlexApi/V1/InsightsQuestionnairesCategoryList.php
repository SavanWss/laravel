<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Rest\FlexApi\V1;

use Twilio\Exceptions\TwilioException;
use Twilio\ListResource;
use Twilio\Options;
use Twilio\Values;
use Twilio\Version;

/**
 * PLEASE NOTE that this class contains preview products that are subject to change. Use them with caution. If you currently do not have developer preview access, please contact help@twilio.com.
 */
class InsightsQuestionnairesCategoryList extends ListResource {
    /**
     * Construct the InsightsQuestionnairesCategoryList
     *
     * @param Version $version Version that contains the resource
     */
    public function __construct(Version $version) {
        parent::__construct($version);

        // Path Solution
        $this->solution = [];

        $this->uri = '/Insights/QM/Categories';
    }

    /**
     * Create the InsightsQuestionnairesCategoryInstance
     *
     * @param string $name The category name.
     * @param array|Options $options Optional Arguments
     * @return InsightsQuestionnairesCategoryInstance Created
     *                                                InsightsQuestionnairesCategoryInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function create(string $name, array $options = []): InsightsQuestionnairesCategoryInstance {
        $options = new Values($options);

        $data = Values::of(['Name' => $name, ]);
        $headers = Values::of(['Token' => $options['token'], ]);

        $payload = $this->version->create('POST', $this->uri, [], $data, $headers);

        return new InsightsQuestionnairesCategoryInstance($this->version, $payload);
    }

    /**
     * Constructs a InsightsQuestionnairesCategoryContext
     *
     * @param string $categoryId Category ID to update
     */
    public function getContext(string $categoryId): InsightsQuestionnairesCategoryContext {
        return new InsightsQuestionnairesCategoryContext($this->version, $categoryId);
    }

    /**
     * Provide a friendly representation
     *
     * @return string Machine friendly representation
     */
    public function __toString(): string {
        return '[Twilio.FlexApi.V1.InsightsQuestionnairesCategoryList]';
    }
}