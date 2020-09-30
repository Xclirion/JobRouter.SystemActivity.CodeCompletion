<?php
interface ISystemActivity {
    public function execute();
    public function isLicensed();
    public function getActivityId();
    public function getActivityName();
    public function getActivityDescription();
    public function getActivityType();
    public function getStatusText();
    public function getDebugText();
    public function getBatchXML();
    public function getSelectedModuleVersion();
    public function getMenuGenerator();
    public function getReturnCodeField();
    public function getErrorMessageField();
    public static function getImagePath();
    public static function getLanguagePath();
}
class Incident {
    public const INCIDENT_STATUS_OPEN = 0;
    public const INCIDENT_STATUS_FINISHED = 5;
    public $activeUsername;
    public $simulate;
    public $processname;
    public $version;
    public $description;
    public $incident;
    public $summaryString;
    public $customField1Template;
    public $customField2Template;
    public $startStep;
    public $startWfid;
    public $processid;
    public $initiator;
    public $summary;
    public $customField1;
    public $customField2;
    public $lastStep;
    public $lastWorkflowId;
    public $incidentsTablename;
    public $fields = [];
    public $subtablefields = [];
    public $tablefieldsarray = [];
    public $subtablefieldsarray = [];
    /**
     * Params:
     * To create a new Incident, fill processname and version.
     * You can use processid, if you want to define the ID from outside.
     * To open an existing incident, fill processid, workflowid or both.
     * @param string $activeUsername
     * @param string $processname
     * @param int $version
     * @param string|null $processid
     * @param string|null $workflowid
     * @param bool $simulation
     * @param \JobRouter\Application\Container $services
     * @throws \JobRouterException
     */
    public function __construct($activeUsername, $processname, $version=0, $processid, $workflowid, $simulation=false, $services) {}
    /**
     * Set active username. All actions will be executed in context of this user.
     * @param string $username
     */
    public function setActiveUsername($username) {}
    /**
     * Set active username. All actions will be executed in context of this user.
     * @return string
     */
    public function getActiveUsername() : string {}
    public function setExecutor(string $executor) : void {}
    public function getExecutor() : ?string {}
    /**
     * Check if it is a new or an existing incident.
     * @return bool
     */
    public function isNewIncident() : bool {}
    /**
     * Sets initiator for incident.
     * @param string $initiator
     */
    public function setInitiator($initiator) {}
    /**
     * Sets the summary for incident.
     * @param string $summaryString
     */
    public function setSummaryString($summaryString) {}
    /**
     * Inserts values in JRINCIDENT or JRINCIDENTSIM table for new incidents.
     * @throws \JobRouterException
     */
    public function createNewIncident() {}
    /**
     * Closes / finishes this incident.
     * @throws \JobRouterException
     */
    public function close() {}
    /**
     * Reactivates the incident.
     * @throws \JobRouterException
     */
    public function reactivate() {}
    /**
     * Deletes the complete incident.
     * @throws \JobRouterException
     */
    public function delete() {}
    /**
     * Updates JRINCIDENT table.
     * @throws \JobRouterException
     */
    public function updateIncident() {}
    /**
     * @param string $workflowid
     * @throws \JobRouterException
     */
    public function deleteStep($workflowid) {}
    /**
     * Return all open steps of the current incident.
     * @throws    \JobRouterException
     */
    public function getOpenSteps() {}
    /**
     * Aborts all open steps of the current incident.
     * @throws    \JobRouterException
     */
    public function abort() {}
    /**
     * Calculates new escalation date.
     * @param string $escalationDate date of new escalation
     * @throws \JobRouterException
     */
    public function setEscalationDate($escalationDate) {}
    /**
     * Calculates new escalation date.
     * @param string $escalation
     * @param string $escalation_time_unit
     * @throws \JobRouterException
     */
    public function calcEscalation($escalation, $escalation_time_unit) {}
    /**
     * Initializes the fields array containing properties of all table fields.
     * @throws JobRouterException
     */
    public function getTableFields() {}
    /**
     * Checks if given process table field exists.
     * @param string $fieldName name of process table field
     * @return bool true if field exists, otherwise false
     */
    public function isTableField($fieldName) : bool {}
    /**
     * Return the definition array for the given process table field.
     * @param string $fieldName name of process table field
     * @return array definition array for the field
     */
    public function getTableField($fieldName) : array {}
    /**
     * Returns the type of the given process table field.
     * @param string $fieldName name of process table field
     * @return string type of process table field
     */
    public function getTableFieldType($fieldName) : string {}
    /**
     * Returns the length of the given process table field.
     * @param    string $fieldName name of process table field
     * @return    string    length of process table field
     */
    public function getTableFieldLength($fieldName) : string {}
    /**
     * Returns the number of decimal places of the given process table field.
     * @param    string $fieldName name of process table field
     * @return    int    number of decimal places of process table field
     */
    public function getTableFieldDecimalPlaces($fieldName) : int {}
    /**
     * Returns timezone of the given process table field.
     * @param    string $fieldName name of process table field
     * @return    string    timezone for given date table field
     */
    public function getTableFieldTimezone($fieldName) : string {}
    /**
     * Checks if given subtable field exists.
     * @param    string $subtable name of subtable
     * @param    string $fieldName name of subtable field
     * @return    bool    true if field exists, otherwise false
     */
    public function isSubtableField($subtable, $fieldName) : bool {}
    /**
     * Return the definition array for the given subtable field.
     * @param string $subtable name of subtable
     * @param string $fieldName name of subtable field
     * @return    array    definition array for the field
     * @throws \InvalidArgumentException
     */
    public function getSubtableField($subtable, $fieldName) : array {}
    /**
     * Returns the type of the given given subtable field.
     * @param    string $subtable name of subtable
     * @param    string $fieldName name of subtable field
     * @return    string    type of subtable field
     */
    public function getSubtableFieldType($subtable, $fieldName) : string {}
    /**
     * Returns the length of the given subtable field.
     * @param    string $subtable name of subtable
     * @param    string $fieldName name of subtable field
     * @return    string    length of subtable field
     */
    public function getSubtableFieldLength($subtable, $fieldName) : string {}
    /**
     * Returns the number of decimal places of the given subtable field.
     * @param string $subtable name of subtable
     * @param string $fieldName name of subtable field
     * @return    string    number of decimal places of subtable field
     * @throws \InvalidArgumentException
     */
    public function getSubtableFieldDecimalPlaces($subtable, $fieldName) : string {}
    /**
     * Returns all steps of the current incident.
     * @return array all incident steps
     * @throws \JobRouterException
     */
    public function getProcessDetails() : array {}
    /**
     * Returns all steps of the current incident.
     * @return bool
     * @throws \JobRouterException
     */
    public function getProcesssTrackingStatus() : bool {}
    /**
     * @return bool
     * @throws \JobRouterException
     */
    public function hasComments() : bool {}
    /**
     * @return array
     * @throws \JobRouterException
     */
    public function getComments() : array {}
    /**
     * @return int
     */
    public function getPriority() : int {}
    /**
     * Sets the priority of the current incident.
     * @param int $priority
     */
    public function setPriority($priority) {}
    /**
     * Checks if this is a simulation.
     * @return bool
     */
    public function isSimulation() : bool {}
    /**
     * @return int
     */
    public function getSimulationFlag() : int {}
    /**
     * Returns processname
     * @return string
     */
    public function getProcessName() : string {}
    /**
     * Returns version
     * @return int
     */
    public function getVersion() : int {}
    /**
     * Returns process version
     * @return    int
     */
    public function getProcessVersion() : int {}
    /**
     * Returns tablename
     * @return string
     */
    public function getTablename() : string {}
    public function getSubtables() {}
    /**
     * @throws \JobRouterException
     */
    public function readSubtables() {}
    /**
     * Returns processid
     * @return string
     */
    public function getProcessId() : string {}
    /**
     * Returns incident number
     * @return int
     */
    public function getIncident() : int {}
    /**
     * Returns info array
     * @return    array
     */
    public function getInfo() : array {}
    /**
     * Returns the value of the given configuration entry.
     * @param string $configurationName
     * @return string
     * @throws \JobRouterException
     */
    public function getConfiguration($configurationName) : string {}
    /**
     * Returns initiator
     * @return string
     */
    public function getInitiator() : string {}
    /**
     * Returns start date
     * @return    string
     */
    public function getStartDate() : string {}
    /**
     * Returns end date
     * @return    string
     */
    public function getEndDate() : string {}
    /**
     * Returns escalation date
     * @return    string
     */
    public function getEscalationDate() : string {}
    /**
     * Returns description
     * @return string
     * @throws \JobRouterException
     */
    public function getDescription() : string {}
    public function setLastWorkflowId($workflowid) {}
    /**
     * @param string $requiredAttribute possible values: input_field, input_required
     * @return array
     */
    public function getProcesstableFields($requiredAttribute='') : array {}
    /**
     * @param string $subtableName
     * @param string $requiredAttribute
     * @return array
     * @throws \JobRouterException
     */
    public function getSubtableFields($subtableName, $requiredAttribute='') : array {}
    public function getSubtableNames() {}
    /**
     * @param string $field_type
     * @return bool
     * @throws \JobRouterException
     */
    private function shouldTrimWhitespaces($field_type) : bool {}
    private function isTextField($field_type) {}
    /**
     * @throws \JobRouterException
     */
    private function initSubtableFields() {}
    private function addFieldIfAttributeIsSet(&$resultFields, $fieldName, $field, $fieldAttribute) {}
    /**
     * @param string $subtableName
     * @throws \JobRouterException
     */
    private function ensureSubtableExists($subtableName) {}
    /**
     * @param string $workflowId
     * @param bool $isSimulation
     * @return \Incident
     * @throws \JobRouterException
     */
    public static function getIncidentByWorkflowId($workflowId, $isSimulation=false) : \Incident {}
}
class Step implements JobRouter\Engine\Settings\Xml\ValueResolverInterface, IProcessAware {
    public const START_BACKLINK = '00000000000000000000000000000000';
    public const SYSTEM_USERNAME = '##wjp_internal##';
    public const STEP_TYPE_USER = 0;
    public const STEP_TYPE_START = 1;
    public const STEP_TYPE_SYSTEMACTIVITY = 2;
    public const STEP_TYPE_DECISION = 3;
    public const STEP_TYPE_SPLIT = 4;
    public const STEP_TYPE_JOIN = 5;
    public const STEP_STATUS_ERROR = -1;
    public const STEP_STATUS_OPEN = 0;
    public const STEP_STATUS_SAVED = 1;
    public const STEP_STATUS_BACK = 2;
    public const STEP_STATUS_SENT = 3;
    public const STEP_STATUS_ASSIGNED = 4;
    public const STEP_STATUS_FINISHED = 5;
    public const STEP_STATUS_ABORTED = 6;
    public const STEP_STATUS_IN_PROGRESS = 10;
    public const STEP_REQUEST_REQUESTED = -1;
    public const STEP_REQUEST_NONE = 0;
    public const STEP_REQUEST_PENDING = 1;
    public const STEP_REQUEST_ANSWERED = 2;
    public const STEP_ASSIGNED_NONE = 0;
    public const STEP_ASSIGNED_BY_USER = 1;
    public const STEP_ASSIGNED_BY_ESCALATION = 2;
    public const STEP_SEND_ACTION_SEND = 1;
    public const STEP_SEND_ACTION_FINISH = 2;
    public const SOURCETYPE_DESKTOP = 1;
    public const SOURCETYPE_MOBILE = 2;
    public const MODULE_TYPE_INTERNAL = 0;
    public const MODULE_TYPE_EXTERNAL = 1;
    public const MODULE_STATUS_OPEN = 0;
    public const MODULE_STATUS_FINISHED = 99;
    public const JOIN_SUBTABLES_ADD_ALL_ROWS = 0;
    public const JOIN_SUBTABLES_COPY_FROM_SELECTED_STEP = 1;
    public const JOIN_SUBTABLES_DO_NOT_COPY = 2;
    public const MENU_LAYOUT_VERTICAL = 1;
    public const MENU_LAYOUT_HORIZONTAL = 2;
    /** @var Step[] */
    public $newSteps = [];
    /** @var Step[] */
    public $activatedSteps = [];
    public $lastUser;
    public $stepStatus;
    public $workflowid;
    public $settings;
    public $moduleType;
    public $errorHandling;
    public $stepType;
    /**
     * Wird diese Variable mit der Step ID des Vorgängers belegt, werden die Subtabledaten
     * kopiert und nicht neu angelegt.
     * @var string
     */
    public $oldStepId;
    public $splitWorkflowid;
    public $activateInStepGroup;
    public $copySubtableRows;
    public $newStep;
    public $assignedSubtable;
    public $assignedSubtableRow;
    public $doCsvExport;
    public $doTxtExport;
    public $doXmlExport;
    public $abortTransaction;
    public $editMode;
    public $createMode;
    public $copySubtable = [];
    public $forwardRulesExecutedCount;
    /**
     * Indicates if the jobfunction is set in JRINCIDENTS since $this->jobfunction
     * will be overwritten with the jobfunction from JRPROCESSDATA if it's empty.
     * Possible values:
     *    - true:    column jobfunction in JRINCIDENTS is empty
     *                $this->jobfunction may be set if there is a jobfunction set in JRPROCESSDATA
     *    - false:    jobfunction is set in JRINCIDENTS
     *                $this->jobfunction contains the jobfunction set in JRINCIDENTS
     * @var boolean
     */
    public $emptyJobfunction;
    /**
     * Incident this step belongs to
     * @var    \Incident
     */
    public $incident;
    /** @var \JobRouter\Application\Container|null */
    protected $services;
    protected $dateTimeService;
    public static $logResource = 'step';
    protected static $replacementMatches;
    protected static $fieldNameMappings;
    /**
     * Step constructor.
     * @param $step
     * @param Incident $incident
     * @param string $mode
     * @param string $workflowid
     * @param bool $disableCheck
     * @param null $services
     * @throws \JobRouterException
     */
    public function __construct($step, Incident $incident, $mode='edit', $workflowid='', $disableCheck=false, $services) {}
    /**
     * @throws \JobRouterException
     */
    public function callInitializationFunction() {}
    /**
     * Returns object of incident class
     * @return    \Incident    incident
     */
    public function getIncident() : Incident {}
    /**
     * Returns number of current step
     * @return    int    number of step
     */
    public function getStep() : int {}
    /**
     * Returns the step label of the current step object.
     * The language used to determine the step label depends on the following cases:
     * 1. If a username is given, the language of this user will be used - this is needed e.g.
     * for standard emails where the language of the recipient user is important, not the language
     * of the current user.
     * 2. If no username is given, the system tries to determine the current user / user language.
     * 3. If no username is given and not current user can be found, e.g. in case a step is sent by
     * JobServer, JobRouter's default language will be used
     * 4. If there is absolutely no language found, then english is used to get the step label
     * @param string $username username (optional)
     * @return    string    the step's label in its correct translation
     * @throws \JobRouterException
     */
    public function getStepLabel($username='') : string {}
    /**
     * @param string $username
     * @return null|string|string[]
     * @throws \JobRouterException
     */
    public function getProcessLabel($username='') : null {}
    /**
     * Returns processid
     * @return    string    processid
     */
    public function getProcessId() : string {}
    /**
     * Returns workflowid
     * @return    string    workflowid
     */
    public function getWorkflowId() : string {}
    /**
     * Returns    backlink (workflowid of preceding step)
     * @return    string    backlink
     */
    public function getBacklink() : string {}
    /**
     * Returns    pool
     * @return    int    pool
     */
    public function getPool() : int {}
    /**
     * Returns    jobfunction
     * @return    string    jobfunction
     */
    public function getJobfunction() : string {}
    public function getTemplateJobfunction() {}
    /**
     * Returns    username
     * @return    string    username
     */
    public function getUsername() : string {}
    /**
     * Returns active username
     * @return    string    active username
     */
    public function getActiveUsername() : string {}
    /**
     * Returns dialog name
     * @return    string dialog name
     */
    public function getDialogName() : string {}
    /**
     * Returns indate
     * @return    int    indate timestamp
     */
    public function getIndate() : int {}
    /**
     * Returns outdate
     * @return    int    outdate timestamp
     */
    public function getOutdate() : int {}
    /**
     * Returns escalation date
     * @return    string escalation date
     */
    public function getEscalationDate() : string {}
    /**
     * Returns escalation timestamp
     * @return    int escalation timestamp
     */
    public function getEscalationTimeStamp() : int {}
    /**
     * Checks if this is a request
     * @return true or false
     */
    public function isRequest() : true {}
    /**
     * Checks if step is assigned
     * @return true or false
     */
    public function isAssigned() : true {}
    /**
     * Checks if this is an answer
     * @return true or false
     */
    public function isAnswer() : true {}
    /**
     * Validates if user has rights to start this incident.
     * @return bool true if user is allowed to start this incident
     * @throws \JobRouterException
     */
    public function checkStartAccess() : bool {}
    /**
     * Defines that this step is an end step.
     * @param bool $value
     */
    public function setEndStep($value) {}
    /**
     * Validates if user has edit access to this step.
     * @param string $message
     * @return bool true if user has edit access to this step
     * @throws \JobRouterException
     */
    public function checkEditAccess(&$message='') : bool {}
    public function isCompleted() {}
    public function isAborted() {}
    public function isAutomatic() {}
    public function isManual() {}
    public function isSplitOrJoin() {}
    public function isSystemActivityOrDecision() {}
    public function setSendInBackground($sendInBackground) {}
    /**
     * Deletes a row of the given subtable.
     * @param string $subtable name of the subtable
     * @param int $rowId id of the row to delete
     * @return void
     * @throws \JobRouterException
     */
    public function deleteSubtableRow($subtable, $rowId) {}
    /**
     * Returns the value of a specific dialog element.
     * @param string $dialogElementName name of dialog element
     * @param string $tableFieldName name of associated table field (optional)
     * @param bool $rawValue flag indicating that value should be returned "raw"
     * @return    string    value of dialog element
     * @throws \JobRouterException
     */
    public function getDialogValue($dialogElementName, $tableFieldName='', $rawValue=false) : string {}
    /**
     * Sets the value of a specific dialog element.
     * @param string $fieldName name of dialog element
     * @param string $value value for the dialog element
     * @return    void
     * @throws \JobRouterException
     */
    public function setDialogValue($fieldName, $value) {}
    /**
     * Return dialogvars as array
     * @return array    array with dialogvars
     */
    public function getDialogVars() : array {}
    /**
     * Checks if dialogvars are already set or given dialog element
     * is present in dialogvars, if specified.
     * @param string $dialogElementName
     * @return    bool    true if dialogvars are already set or given
     *                    dialog element is present in dialogvars
     */
    public function dialogVarsExist($dialogElementName='') : bool {}
    /**
     * Attaches a file to a process table field.
     * @param string $fieldname Name of process table column
     * @param string $filename File to attach
     * @throws \Exception
     * @throws \JobRouterException
     */
    public function attachFile($fieldname, $filename) {}
    /**
     * Deletes an attached file from a process table field.
     * @param string $fieldname Name of process table column
     * @throws \Exception
     * @throws \JobRouterException
     */
    public function deleteFile($fieldname) {}
    /**
     * Attaches a file to a subtable field.
     * @param string $subtable Name of subtable
     * @param int $row Number of subtable row
     * @param string $fieldname Name of subtable column
     * @param string $filename File to attach
     * @throws \Exception
     * @throws \JobRouterException
     */
    public function attachSubtableFile($subtable, $row, $fieldname, $filename) {}
    /**
     * Deletes an attached file from a subtable field.
     * @param string $subtable Name of subtable
     * @param int $row Number of subtable row
     * @param string $fieldname Name of subtable column
     * @throws \Exception
     * @throws \JobRouterException
     */
    public function deleteSubtableFile($subtable, $row, $fieldname) {}
    /**
     * Returns the original filename of an attachment.
     * @param string $fieldname
     * @param int $row
     * @param string $subtable
     * @param bool $includeFolder
     * @return string original filename, optionally including folder
     * @throws \JobRouterException
     */
    public function getOriginalFilename($fieldname, $row=0, $subtable='', $includeFolder=false) : string {}
    /**
     * Returns the value of a specific process table field.
     * @param string $fieldname Name of process table field
     * @param bool $formatValue true, if value should be formatted according to current user's settings (optional)
     * @param bool $sysFormat flag indicating that value should be returned in internal system format
     * @param bool $rawValue flag indicating that value should be returned "raw"
     * @return mixed value of process table field
     * @throws \JobRouterException
     */
    public function getTableValue($fieldname, $formatValue=false, $sysFormat=false, $rawValue=false) : mixed {}
    /**
     * Returns the previous value of a specific process table field.
     * The previous value of the field is the final value from the previous step.
     * When the current step is the first step of an incident, then null is returned.
     * @param string $fieldname Name of process table field
     * @param bool $formatValue true, if value should be formatted according to current user's settings (optional)
     * @param bool $sysFormat flag indicating that value should be returned in internal system format
     * @param bool $rawValue flag indicating that value should be returned "raw"
     * @return mixed previous value of process table field
     * @throws \JobRouterException
     * @throws \InvalidArgumentException
     */
    public function getOldTableValue($fieldname, $formatValue=false, $sysFormat=false, $rawValue=false) : mixed {}
    /**
     * Sets the value of a specific process table field.
     * @param string $fieldname Name of process table field
     * @param string $value New value for process table field
     * @param bool $valueIsUTF8 true if $value is UTF8-encoded
     * @throws \Exception
     * @throws \JobRouterException
     */
    public function setTableValue($fieldname, $value, $valueIsUTF8=false) {}
    /**
     * Returns the value of a specific subtable field.
     * @param string $subtable Name of subtable
     * @param int $row Row of subtable
     * @param string $fieldname Column of subtable
     * @param bool $formatValue true, if value should be formatted according to current user's settings (optional)
     * @param bool $rawValue flag indicating that value should be returned "raw"
     * @param bool $sysFormat flag indicating that value should be returned in internal system format
     * @return mixed value of subtable field
     * @throws \JobRouterException
     */
    public function getSubtableValue($subtable, $row, $fieldname, $formatValue=false, $rawValue=false, $sysFormat=false) : mixed {}
    /**
     * Sets the value of a specific subtable field.
     * @param string $subtable Name of subtable
     * @param int $row Row of subtable
     * @param string $fieldname Column of subtable
     * @param string $value New value for subtable field
     * @param bool $valueIsUTF8 true, if $value is UTF8-encoded
     * @throws \Exception
     * @throws \JobRouterException
     */
    public function setSubtableValue($subtable, $row, $fieldname, $value, $valueIsUTF8=false) {}
    /**
     * @param $subtable
     * @param $row
     * @param array|null $data
     * @throws \JobRouterException
     */
    public function insertSubtableRow($subtable, $row, array $data) {}
    /**
     * Returns the row ids of all rows of a given subtable for the current step.
     * @param string $subtable subtable name
     * @return array Array with row ids
     * @throws \JobRouterException
     */
    public function getSubtableRowIds($subtable) : array {}
    /**
     * Deletes all entries in a specific subtable.
     * @param string $subtable Name of subtable
     * @param bool $deleteAttachedFiles Flag, if true then all attached files in the subtable
     *                                            will also be deleted physically
     * @return    void
     * @throws \JobRouterException
     */
    public function clearSubtable($subtable, $deleteAttachedFiles=false) {}
    public function setJRSendAction($jrSendAction) {}
    public function setTable($table) {}
    public function setSubtables($subtable) {}
    public function getTable() {}
    /**
     * @param string $subtable
     * @return array|mixed
     * @throws \JobRouterException
     */
    public function getSubtables($subtable='') : array {}
    public function getStatus() {}
    public function setStatus($status, $errormsg='') {}
    public function getStepStatus() {}
    public function setUsername($username) {}
    public function setJobfunction($jobfunction) {}
    public function setPool($pool) {}
    public function setSummary($summary) {}
    public function setCustomField1($customField1) {}
    public function setCustomField2($customField2) {}
    public function setStepStatus($stepStatus) {}
    public function setSourceType($sourceType) {}
    public function getSourceType() {}
    /**
     * Ändert den Status sofort
     * @param $status
     * @param string $errormsg
     * @throws \JobRouterException
     */
    public function changeStatus($status, $errormsg='') {}
    /**
     * @param $subtableName
     * @return array|mixed
     * @throws ßJobRouterException
     */
    public function getSubtableData($subtableName) : array {}
    public function isSendInBackgroundActive() {}
    /**
     * @throws \JobRouterException
     */
    public function removeLock() {}
    /**
     * Returns value with replacements done for variables contained in the input value.
     * @param mixed $value input value
     * @param int $row row number (optional, needed for subtable replacements)
     * @param bool $formatValue true, if value should be formatted according
     *                                        to current user's settings (optional)
     * @param bool $utf8DecodeUser true, if user replacements (jr_lastname, jr_prename, etc)
     *                                        should be utf8 decoded
     * @param bool $escapeForSQL
     * @param bool $escapeForCondition
     * @param bool $sysFormat
     * @return string $value                output value
     * @throws \JobRouterException
     */
    public function replaceValue($value, $row=0, $formatValue=false, $utf8DecodeUser=false, $escapeForSQL=false, $escapeForCondition=false, $sysFormat=false) : string {}
    /**
     * @param $value
     * @param $row
     * @param $options
     * @return string
     * @throws \JobRouterException
     */
    public function replaceValueWithOptions($value, $row=0, $options) : string {}
    /**
     * @param int $dateFormat
     * @throws \JobRouterException
     */
    public function setDateFormat(int $dateFormat) {}
    /**
     * @param $value
     * @param $escapeForSQL
     * @param IUser|null $user
     * @return mixed
     * @throws \JobRouterException
     */
    public function replaceMessageVariables($value, $escapeForSQL, IUser $user) : mixed {}
    /**
     * Reserves step for current user.
     * @throws \JobRouterException
     */
    public function reserve() {}
    public function isReserved() {}
    /**
     * Sends step back to last user
     * @param string $notice
     * @throws \JobRouterException
     * @throws \InvalidArgumentException
     */
    public function sendBack($notice) {}
    /**
     * Sends a request to another user or jobfunction
     * @param $jobfunction
     * @param $username
     * @param $notice
     * @throws \JobRouterException
     * @internal param $jobfunction
     * @internal param $username
     * @internal param $notice
     */
    public function request($jobfunction, $username, $notice) {}
    /**
     * Assigns step to an other user or jobfunction
     * @param $type
     * @param $value
     * @param $notice
     * @throws \JobRouterException
     * @internal param $type - "job" or "user"
     * @internal param $value - selected jobfunction or username
     * @internal param $notice - assignment notice
     */
    public function assign($type, $value, $notice) {}
    /**
     * Jump to another step
     * @param int $step
     * @throws \JobRouterException
     * @throws InvalidArgumentException
     */
    public function jumpTo($step) {}
    /**
     * set a resubmission
     * @param $time
     * @param $type
     * @param $text
     * @param $jrStepJobFunction
     * @throws \JobRouterException
     */
    public function resubmission($time, $type, $text, $jrStepJobFunction) {}
    /**
     * Saves the current step. Writes data into JRINCIDENT, JRINCIDENTS, process table and subtables.
     * @param bool $sendMails
     * @param string $action
     * @param bool $saveBeforeSend
     * @throws \JobRouterException
     */
    public function save($sendMails=true, $action='', $saveBeforeSend=false) {}
    /**
     * @throws \JobRouterException
     */
    public function clearSubtablesAfterSendError() {}
    /**
     * Reactivates closed or cancelled step.
     * @throws \JobRouterException
     */
    public function reactivate() {}
    /**
     * Aborts the current step.
     * @param string $notice step notice
     * @throws \JobRouterException
     */
    public function abort($notice='') {}
    /**
     * @throws \JobRouterException
     */
    public function delete() {}
    /**
     * Sends the current step.
     * @param string $notice step notice
     * @return bool|void true on success
     * @throws \Exception
     * @throws \JobRouterException
     */
    public function send(string $notice='') : bool {}
    /**
     * @throws \JobRouterException
     */
    public function removeLockFile() {}
    /**
     * Gets resubmission date of current step.
     * @return    string date of resubmission (timestamp)
     */
    public function getResubmissionDate() : string {}
    /**
     * Sets new resubmission date for current step.
     * @param string $resubmissionDate date of new resubmission
     * @throws \JobRouterException
     */
    public function setResubmissionDate($resubmissionDate) {}
    /**
     * Sets new escalation date for current step.
     * @param string $escalationDate date of new escalation
     * @throws \JobRouterException
     */
    public function setEscalationDate($escalationDate) {}
    /**
     * Sets new escalation timestamp for current step.
     * @param int $escalationTimeStamp date of new escalation as UNIX timestamp
     * @throws \JobRouterException
     */
    public function setEscalationTimeStamp($escalationTimeStamp) {}
    /**
     * Calculates new resubmission date for current step.
     * @param    $resubmissionTime
     * @param    $resubmissionType
     * @throws \JobRouterException
     */
    public function calcResubmission($resubmissionTime, $resubmissionType) {}
    /**
     * Calculates new escalation date for current step.
     * @param    $escalationType
     * @param    $escalation
     * @param    $escalationTimeUnit
     * @param    $escalationValue
     * @throws \JobRouterException
     */
    public function calcEscalation($escalationType, $escalation, $escalationTimeUnit, $escalationValue) {}
    /**
     * Sets recipient of current step.
     * @param string $jobfunction jobfunction
     * @param string $username username
     * @param string $customValue username or jobfunction
     * @throws JobRouterException
     */
    public function setRecipient($jobfunction='', $username='', $customValue='') {}
    /**
     * Sets the backlink for the current step.
     * @param string $backlink backlink
     */
    public function setBacklink($backlink) {}
    /**
     * Sets the active username for current step.
     * All actions will be done in context of this user.
     * @param string $username active username
     */
    public function setActiveUsername($username) {}
    /**
     * Sets username of last user.
     * @param string $lastUser username of last user
     */
    public function setLastUser($lastUser) {}
    /**
     * Returns username of last user.
     * @return    string    username of last user
     */
    public function getLastUser() : string {}
    public function setNotice($notice) {}
    /**
     * Changes escalation date.
     * @param int $escalationDate wew escalation date as UNIX timesstamp
     * @throws \JobRouterException
     */
    public function changeEscalation($escalationDate) {}
    /**
     * Executes PHP module.
     * @throws \JobRouterException    In case of an error a JobRouterException is thrown.
     * @throws \Exception
     */
    public function executeModule() {}
    /**
     * Checks if the given button should be displayed in dialog.
     * @param string $button name of button (send, save, finish, request, assign,
     *                            print, map, back, info, details, reserve)
     * @return    bool    true or false
     * @deprecated since 5.0, use UserActionInformationProvider instead
     */
    public function showButton($button) : bool {}
    /**
     * Returns priority of current step.
     * @return    int     step priority
     */
    public function getPriority() : int {}
    /**
     * @param string $message
     * @param int $type
     * @param string $avatar
     */
    public function addMessage($message, $type=MessagesManager::MSG_WARNING, $avatar = '') {}
    /**
     * Loads all messages for current step.
     * @throws JobRouterException
     */
    public function loadMessages() {}
    /**
     * Adds a submit info message for current step.
     * @param string $submitInfoSubject subject of info message
     * @param string $submitInfoText info message text
     */
    public function setSubmitInfo($submitInfoSubject, $submitInfoText) {}
    /**
     * Returns submit info messages for current step.
     * @return    array    array with submit info messages
     */
    public function getSubmitInfoMessages() : array {}
    /**
     * Loads dialog integrations for current step and returns array
     * with dialog integration data.
     * @return array array with dialog integration data
     * @throws \JobRouterException
     */
    public function getDialogIntegrations() : array {}
    /**
     * Returns dialog object for current step.
     * @return mixed dialog object
     * @throws \Exception
     * @throws \JobRouterException
     */
    public function getDialog() {}
    /**
     * @throws \JobRouterException
     */
    public function getMobileDialog() {}
    public function hasMobileDialog() {}
    /**
     * @return mixed
     * @throws \JobRouterException
     */
    public function getDialogElements() : mixed {}
    /**
     * @param $dialogFieldName
     * @return bool
     * @throws \JobRouterException
     */
    public function getDialogElementValue($dialogFieldName) : bool {}
    public function isAutoReserve() {}
    /**
     * Checks if current step is in simulation mode.
     * @return    bool    true or false
     */
    public function isSimulation() : bool {}
    public function isPublicStart() {}
    public function isDirectOpen() {}
    /**
     * Returns process name for current step.
     * @return    string     process name
     */
    public function getProcessName() : string {}
    /**
     * Returns process version for current step.
     * @return    int    process version
     */
    public function getVersion() : int {}
    /**
     * Returns process version for current step.
     * @return    int    process version
     */
    public function getProcessVersion() : int {}
    /**
     * Returns process tablename for current step.
     * @return string    process tablename
     */
    public function getTablename() : string {}
    /**
     * Returns incident number for current step.
     * @return    int    incident number
     */
    public function getIncidentNumber() : int {}
    /**
     * Return position of the menu.
     * @return    int    position of the menu
     */
    public function getPosMenu() : int {}
    /**
     * Checks if given process table field exists.
     * @param string $fieldName name of process table field
     * @return    bool    true, if field exists, otherwise false
     */
    public function isTableField($fieldName) : bool {}
    /**
     * Returns the type of the given process table field.
     * @param string $fieldName name of process table field
     * @return    string    type of process table field
     */
    public function getTableFieldType($fieldName) : string {}
    /**
     * Returns the length of the given process table field.
     * @param string $fieldName name of process table field
     * @return    string    length of process table field
     */
    public function getTableFieldLength($fieldName) : string {}
    /**
     * Returns the number of decimal places of the given process table field.
     * @param string $fieldName name of process table field
     * @return    int    number of decimal places of process table field
     */
    public function getTableFieldDecimalPlaces($fieldName) : int {}
    /**
     * Returns the number of decimal places of the given process table field.
     * @param string $fieldName name of process table field
     * @return    string    timezone of process date table field
     */
    public function getTableFieldTimezone($fieldName) : string {}
    /**
     * Checks if given subtable field exists.
     * @param string $subtable name of subtable
     * @param string $fieldName name of subtable field
     * @return    bool    true, if field exists, otherwise false
     */
    public function isSubtableField($subtable, $fieldName) : bool {}
    /**
     * Returns the type of the given given subtable field.
     * @param string $subtable name of subtable
     * @param string $fieldName name of subtable field
     * @return    string    type of subtable field
     */
    public function getSubtableFieldType($subtable, $fieldName) : string {}
    /**
     * Returns the length of the given subtable field.
     * @param string $subtable name of subtable
     * @param string $fieldName name of subtable field
     * @return    string    length of subtable field
     */
    public function getSubtableFieldLength($subtable, $fieldName) : string {}
    /**
     * Returns the number of decimal places of the given subtable field.
     * @param string $subtable name of subtable
     * @param string $fieldName name of subtable field
     * @return    string    number of decimal places of subtable field
     * @throws InvalidArgumentException
     */
    public function getSubtableFieldDecimalPlaces($subtable, $fieldName) : string {}
    /**
     * Returns number of rows for given subtable.
     * @param string $subtable name of subtable
     * @return    int    number of rows for given subtable
     * @throws \JobRouterException
     */
    public function getSubtableCount($subtable) : int {}
    /**
     * Returns the notice for the current step.
     * return    string    notice
     */
    public function getNotice() {}
    /**
     * Returns the notice for the current step.
     * return    string    notice
     */
    public function getNotice2() {}
    /**
     * Return an array with informational data about the current step.
     * @return    array    array with informational data
     * @throws \JobRouterException
     */
    public function getInfo() : array {}
    /**
     * Returns flag indicating if current step is newly created.
     * @return    int    1, if current step is newly created, 0 otherwise
     */
    public function getNewStepFlag() : int {}
    /**
     * Returns step error.
     * return    int    error code
     */
    public function getError() {}
    /**
     * Return step error message.
     * return    string    error message
     */
    public function getErrorMessage() {}
    /**
     * Copies values in one subtable from an old step into a new step.
     * @param string $sourceStepId
     * @param string $singleSubtable
     * @throws \JobRouterException
     */
    public function copySubtables($sourceStepId, $singleSubtable='') {}
    /**
     * Disables sending of email messages for current step.
     */
    public function disableNotification() {}
    public function notificationsEnabled() {}
    /**
     * Returns an array with information about executed rules.
     * @return    array    array with information about executed rules
     */
    public function getRulesArray() : array {}
    /**
     * Adds an entry to the array of executed rules.
     * @param    $ruleInfo
     */
    public function addRuleInfo($ruleInfo) {}
    /**
     * Adds an SQL query to the list of SQL queries that should
     * be executed after committing the transaction.
     * @param string $connectionName name of database connection that should
     *                                    be used for SQL query
     * @param string $sqlString SQL query that should be executed after
     *                                    committing the transaction
     */
    public function addSQLAfterTransaction($connectionName, $sqlString) {}
    /**
     * Executes SQL statements from rules after commiting the transaction.
     * @throws \JobRouterException
     */
    public function executeSQLAfterTransaction() {}
    /**
     * Reads dialog fields and values in dialogFields array and returns it.
     * @return array associative array of dialog fields and values from last request
     * @throws \JobRouterException
     */
    public function getDialogFields() : array {}
    /**
     * Returns the step id (process_step_id) of the current step.
     * @return    string    step id (GUID)
     */
    public function getStepId() : string {}
    /**
     * Returns the step summary of the current step.
     * @return    string    step summary
     */
    public function getSummary() : string {}
    public function getCustomField1() {}
    public function getCustomField2() {}
    public function getActivatedSteps() {}
    public function setAnswerRecipient($usernameOrJobfunction, $recipientType=1) {}
    public function getAnswerRecipient() {}
    public function getModuleName() {}
    public function getModuleType() {}
    public function getStepType() {}
    public function isNewStep() {}
    public function getHelpUrl() {}
    public function isEditable() {}
    public function isTableSet() {}
    public function setPriority($priority) {}
    public function setDialogElementAttributes($dialogElementAttributes) {}
    public function getDialogElementAttributes() {}
    public function appendRuleLog(Rule_RuleLog $ruleLog) {}
    public function getCurrentSubtableForRuleExecution() {}
    public function getCurrentSubtableRowIdForRuleExecution() {}
    public function setCurrentSubtableRowIdForRuleExecution($rowId) {}
    public function setCurrentSubtableForRuleExecution($subtableName) {}
    /**
     * @param $value
     * @return float|string
     * @throws \JobRouterException
     */
    public function getUnformattedValue($value) : float {}
    public function setStepGroupId($stepGroupId) {}
    /**
     * @param $escalationDate
     * @throws \JobRouterException
     */
    public function setIncidentEscalationDate($escalationDate) {}
    public function getEventLogger() {}
    /**
     * @param $sendError
     * @throws \JobRouterException
     */
    public function setSendError($sendError) {}
    public function setCurrentRule($rule) {}
    public function getCurrentRule() {}
    /**
     * @param $value
     * @return string
     * @throws \JobRouterException
     */
    public function replaceVariables($value) : string {}
    /**
     * @return boolean
     */
    public function isInitializationFunctionCalled() : boolean {}
    public function hasEscalated($testCurrentDate, $testOutDate) {}
    /**
     * @param string $subtable
     * @param integer $row
     * @return bool
     */
    public function isSubtableRowInInsertArray($subtable, $row) : bool {}
    public function getPublicStartGuid() {}
    public function setOpenDirectly(bool $openDirectly) {}
    public function wasOpenedDirectly() {}
    public function setInProgress($inProgress) {}
    public function setStepAction($stepAction) {}
    public function getStepAction() {}
}
/**
 * Datenbank-Klasse
 * Diese Klasse wird für sämtliche Zugriffe auf Datenbanken im
 * JobRouter verwendet und abstrahiert von dem zugrunde liegenden
 * DBMS sowie der Art der Datenbankverbindung (ODBC oder nativ).
 * Unterstützt ODBC-Verbindungen mit MSSQL, MySQL und Oracle sowie
 * native Verbindungen mit MSSQL, MySQL, Oracle und IBM DB2.
 * Die Implementierung basiert auf dem MDB2-Paket von PEAR.
 * @package Database
 */
class JobDB implements \JobRouter\Common\Database\ConnectionInterface, \JobRouter\Common\Database\SchemaManipulationInterface, \Serializable {
    public const PAGING_OPT_LEVEL_OFF = 0;
    public const PAGING_OPT_LEVEL_MODERATE = 1;
    public const PAGING_OPT_LEVEL_AGGRESSIVE = 2;
    public const TYPE_MAPPING = [     'mock' => 1,     'mysql' => 1,     'mysqli' => 1,     'oci8' => 2,     'odbc' => 3,     'db2' => 4,     'ibm_db2' => 4,     'sqlsrv' => 5,     'mssql' => 0,     'sqlite3' => 9 ];
    public const DB_MSSQL = 0;
    public const DB_MYSQL = 1;
    public const DB_ORACLE = 2;
    public const DB_ODBC = 3;
    public const DB_DB2 = 4;
    public const DB_SQLSRV = 5;
    public const DB_SQLITE3 = 9;
    public const DATABASE_LABEL = [     0 => 'MS SQL',     1 => 'MySQL / MariaDB',     2 => 'ORACLE',     3 => 'ODBC',     4 => 'DB2',     5 => 'SQLSRV',     9 => 'SQLite3' ];
    public const TYPE_CLOB = 'clob';
    public const TYPE_DECIMAL = 'decimal';
    public const TYPE_DATETIME = 'timestamp';
    public const TYPE_INTEGER = 'integer';
    public const TYPE_TEXT = 'text';
    public const DSN_KEY_PASSWORD = 'password';
    public const SCHEMA_TABLE_SEPARATOR = '##_##';
    public const DB_SERVER_DATE_FORMATS = [     0 => 'Ymd H:i:s',     1 => 'Y-m-d H:i:s',     2 => 'Y-m-d H:i:s',     3 => 'Ymd H:i:s',     4 => 'Y-m-d H:i:s',     5 => 'Ymd H:i:s',     9 => 'Ymd H:i:s' ];
    /**
     * Konstruktor
     * Setzt das Verbindungsobjekt und das Log-Objekt und aktiviert
     * das Logging standardmäßig.
     * @param object $mdb2 MDB2-Objekt
     */
    public function __construct($mdb2) {}
    public function getCharset() {}
    public function setCharset($charset) {}
    /**
     * Methode schließt die Datenbankverbindung, wenn das aktuelle Objekt
     * nicht mehr referenziert bzw. explizit zerstört wird.
     */
    public function __destruct() {}
    public function setLogPath($logPath) {}
    public function initLogging($filePrefix='db') {}
    /**
     * Methode establish a connection to the database.
     * @param \JobRouter\Log\LogInfoInterface $logInfo LogInfo-Objekt
     * @param bool $loggingEnabled Flag, das angibt, ob der Aufruf geloggt werden soll
     * @return    bool    true, wenn die Verbindung erfolgreich hergestellt wurde, sonst false
     */
    public function connect(\JobRouter\Log\LogInfoInterface $logInfo, $loggingEnabled=true) : bool {}
    /**
     * @inheritDoc
     */
    public function query($sql, \JobRouter\Log\LogInfoInterface $logInfo, $loggingEnabled=true) {}
    /**
     * Create a new database.
     * In case of an error the method returns false.
     * @param string $databaseName Name of the database that should be created
     * @return    bool    true on success, false when error occurred
     */
    public function createDatabase($databaseName) : bool {}
    /**
     * Drops a database.
     * In case of an error the method returns false.
     * @param string $databaseName Name of the database that should be dropped
     * @return    bool    true on success, false when error occurred
     */
    public function dropDatabase($databaseName) : bool {}
    /**
     * Alter an existing table.
     * The new definition array used for modifications is broken
     * down into the following keys:
     * name: New name for the table
     * add: New fields to be added
     * remove: Fields to be dropped
     * rename: Fields to rename
     * change: Fields to modify
     * Here's how to modify a name field to store only a hundred characters:
     *    $definition = [
     *        'change' => [
     *            'name' => [
     *                'definition' => [
     *                    'length' => 100,
     *                    'type' => 'text',
     *                ]
     *            ],
     *        ]
     *    ];
     * Here's how to add a new field to store only hundred characters:
     *    $definition = [
     *        'add' => [
     *            'name' => [
     *                'length' => 100,
     *                'type' => 'text',
     *            ]
     *        ]
     *    ];
     * Here's how to rename a field:
     *    $definition = [
     *        'rename' => [
     *            'name' => 'newfieldname',
     *            'definition' => [
     *                'type' => 'text',
     *            ]
     *        ]
     *    ];
     * Here's how ro remove a field:
     *    $definition = [
     *        'remove' => [
     *            'name' => [],
     *        ]
     *    ]
     * Here's how to rename a table:
     *    $definition = [
     *       'name' => 'renamedtablename'
     *    ]
     * Im Fehlerfall liefert die Methode false zurück.
     * @param string $tableName name of the table that is intended to be changed
     * @param mixed $definition associative array that contains the details of each type of
     *                                change that is intended to be performed. The types of changes
     *                                that are currently supported are defined as follows:
     *                                name: New name for the table.
     *                                add: Associative array with the names of fields to be added as
     *                                indexes of the array. The value of each entry of the array should
     *                                be set to another associative array with the properties of the
     *                                fields to be added. The properties of the fields should be the
     *                                same as defined by the MDB2 parser.
     *                                remove: Associative array with the names of fields to be removed
     *                                as indexes of the array. Currently the values assigned to each
     *                                entry are ignored. An empty array should be used for future compatibility.
     *                                rename: Associative array with the names of fields to be renamed
     *                                as indexes of the array. The value of each entry of the array
     *                                should be set to another associative array with the entry named
     *                                name with the new field name and the entry named Declaration that
     *                                is expected to contain the portion of the field declaration already
     *                                in DBMS specific SQL code as it is used in the CREATE TABLE statement.
     *                                change: Associative array with the names of the fields to be changed
     *                                as indexes of the array. Keep in mind that if it is intended to change
     *                                either the name of a field and any other properties, the change array
     *                                entries should have the new names of the fields as array indexes.
     *                                The value of each entry of the array should be set to another associative
     *                                array with the properties of the fields to that are meant to be changed as
     *                                array entries. These entries should be assigned to the new values of the
     *                                respective properties. The properties of the fields should be the same as
     *                                defined by the MDB2 parser.
     * @param bool $check indicates whether the function should just check if the DBMS driver
     *                                can perform the requested table alterations if the value is true or actually
     *                                perform them otherwise
     * @return    bool    true bzw. false, wenn ein Fehler aufgetreten ist
     */
    public function alterTable($tableName, $definition, $check=false) : bool {}
    /**
     * Create a new table.
     * The method createTable() takes three parameters:
     * The table name, an array of field definition and
     * some extra options (optional and RDBMS-specific).
     * $definition = array (
     *     'id' => array (
     *         'type' => 'integer',
     *         'unsigned' => 1,
     *         'notnull' => 1,
     *         'default' => 0,
     *     ),
     *     'name' => array (
     *         'type' => 'text',
     *         'length' => 255
     *     ),
     *     'datetime' => array (
     *         'type' => 'timestamp'
     *     )
     * );
     * In case of an error it gives false back
     * @param string $tableName Name of the table that should be created
     * @param mixed $definition Associative array that contains the definition of each field
     *                          of the new table. The indexes of the array entries are the
     *                          names of the fields of the table and the array entry values are
     *                          associative arrays like those that are meant to be passed with
     *                          the field definitions to get[Type]Declaration() functions:
     *                          array('id' => array('type' => 'integer', 'unsigned' => 1,
     *                              'notnull' => 1, 'default' => 0),
     *                             'name' => array('type' => 'text', 'length' => 12),
     *                              'password' => array('type' => 'text', 'length' => 12)
     *                          )
     * @param mixed $tableOptions An associative array of table options:
     *                            array('comment' => 'Foo', 'temporary' => true|false)
     * @param bool $loggingEnabled
     * @return bool true bzw. false, wenn ein Fehler aufgetreten ist
     */
    public function createTable($tableName, $definition, $tableOptions, $loggingEnabled=true) : bool {}
    /**
     * Deletes a table
     * The method dropTable() has one Parameter:
     * In case of an error it gives false back
     * @param string $tableName Name of the table that should be created
     * @return    bool    true bzw. false, wenn ein Fehler aufgetreten ist
     */
    public function dropTable($tableName) : bool {}
    /**
     * Create a constraint on a table.
     * The full structure of the definition array looks like this:
     * array (
     *    [primary] => 0
     *    [unique]  => 0
     *    [foreign] => 1
     *    [check]   => 0
     *    [fields] => array (
     *        [field1name] => array() // one entry per each field covered
     *        [field2name] => array() // by the index
     *        [field3name] => array(
     *            [sorting]  => ascending
     *            [position] => 3
     *        )
     *    )
     *    [references] => array(
     *        [table] => name
     *            [fields] => array(
     *                [field1name] => array(  //one entry per each referenced field
     *                    [position] => 1
     *                )
     *            )
     *        )
     *    [deferrable] => 0
     *    [initiallydeferred] => 0
     *    [onupdate] => CASCADE|RESTRICT|SET NULL|SET DEFAULT|NO ACTION
     *    [ondelete] => CASCADE|RESTRICT|SET NULL|SET DEFAULT|NO ACTION
     *    [match] => SIMPLE|PARTIAL|FULL
     * );
     * Im Fehlerfall liefert die Methode false zurück.
     * @param string $tableName name of the table on which the constraint is to be created
     * @param string $constraintName name of the constraint to be created
     * @param mixed $definition associative array that defines properties of the constraint to be created.
     * @return    bool    true bzw. false, wenn ein Fehler aufgetreten ist
     */
    public function createConstraint($tableName, $constraintName, $definition) : bool {}
    /**
     * Create an index on a table.
     * The full structure of the definition array looks like this:
     * array (
     *    [fields] => array (
     *        [field1name] => array() // one entry per each field covered
     *        [field2name] => array() // by the index
     *        [field3name] => array(
     *            [sorting]  => ascending
     *            [length] => 3
     *        )
     *    )
     * );
     * Im Fehlerfall liefert die Methode false zurück.
     * @param string $tableName name of the table on which the index is to be created
     * @param string $indexName name of the index to be created
     * @param mixed $definition associative array that defines properties of the index to be created.
     * @return    bool    true bzw. false, wenn ein Fehler aufgetreten ist
     */
    public function createIndex($tableName, $indexName, $definition) : bool {}
    /**
     * Drops an existing constraint from a table.
     * Im Fehlerfall liefert die Methode false zurück.
     * @param string $tableName name of the table from which the constraint is to be dropped
     * @param string $constraintName name of the constraint to be dropped
     * @param bool|string $primary hint if constraint is a primary one
     * @return bool true bzw. false, wenn ein Fehler aufgetreten ist
     */
    public function dropConstraint($tableName, $constraintName, $primary=false) : bool {}
    /**
     * Drops an existing index from a table.
     * Im Fehlerfall liefert die Methode false zurück.
     * @param string $tableName name of the table from which the index is to be dropped
     * @param string $indexName name of the index to be dropped
     * @return    bool    true bzw. false, wenn ein Fehler aufgetreten ist
     */
    public function dropIndex($tableName, $indexName) : bool {}
    /**
     * @inheritDoc
     */
    public function exec($query, \JobRouter\Log\LogInfoInterface $logInfo, $loggingEnabled=true) {}
    /**
     * Methode liefert nächsten Datensatz als indiziertes Array zurück.
     * Wenn keine weiteren Datensätze mehr im Result vorhanden sind, wird null zurückgeliefert.
     * Im Fehlerfall liefert die Methode false zurück.
     * @param $result Objekt, das von query() zurückgeliefert wird
     * @return array|null|false Datensatz als indiziertes Array, null oder false im Fehlerfall
     */
    public function fetchArray($result) : array {}
    /**
     * {@inheritdoc}
     */
    public function fetchRow($result) : array {}
    /**
     * Methode liefert nächsten Datensatz als Objekt zurück.
     * Wenn keine weiteren Datensätze mehr im Result vorhanden sind, wird null zurückgeliefert.
     * Im Fehlerfall liefert die Methode false zurück.
     * @param $result Objekt, das von query() zurückgeliefert wird
     * @param string $className Name der Klasse, in der das Result gespeichert werden soll
     * @return object|null|false Datensatz als Objekt, null oder false im Fehlerfall
     */
    public function fetchObject($result, $className='stdClass') : object {}
    /**
     * Methode liefert erste Spalte des Abfrageergebnisses zurück.
     * Im Fehlerfall liefert die Methode false zurück.
     * @param $result Objekt, das von query() zurückgeliefert wird
     * @return array|false
     */
    public function fetchCol($result) : array {}
    /**
     * Methode liefert alle Zeilen des Abfrageergebnisses zurück.
     * Im Fehlerfall liefert die Methode false zurück.
     * @param $result Objekt, das von query() zurückgeliefert wird
     * @return array|false
     */
    public function fetchAll($result) : array {}
    /**
     * Methode liefert erste Spalte des nächsten Datensatzes zurück.
     * Im Fehlerfall liefert die Methode false zurück.
     * @param $result Objekt, das von query() zurückgeliefert wird
     * @return string|false
     */
    public function fetchOne($result) : string {}
    /**
     * Retrieve the names of columns returned by the DBMS in a query result or from the cache.
     * @param $result Object which is returned from the query() method
     * @param bool $flip If set to true the values are the column names,
     *                   otherwise the names of the columns are the keys.
     * @return mixed Array that holds the names of columns or false on failure.
     */
    public function getColumnNames($result, $flip=false) : mixed {}
    /**
     * Methode liefert einen Ausschnitt des Ergebnisses einer SELECT-Anfrage.
     * Im Fehlerfall liefert die Methode null zurück.
     * @param string|QueryBuilder $query SELECT-Anfrage
     * @param int|string $perPage Anzahl zurückzuliefernder Datensätze
     * @param \JobRouter\Log\LogInfoInterface $logInfo
     * @param bool $loggingEnabled
     * @param bool $append
     * @param string $fileName
     * @param int $totalItems
     * @param array $pagerArgs
     * @param bool $ignoreRewriteCountQueryChecks
     * @return array Array mit Links und den entsprechenden Datensätzen, false im Fehlerfall
     * @throws \JobRouterException
     * @throws \Exception
     */
    public function getPagedResult($query, $perPage='', \JobRouter\Log\LogInfoInterface $logInfo, $loggingEnabled=true, $append=true, $fileName='', $totalItems, array $pagerArgs, $ignoreRewriteCountQueryChecks=false) : array {}
    /**
     * Methode liefert die Views der aktuellen Datenbank zurück.
     * Im Fehlerfall liefert die Methode false zurück.
     * @return    mixed    Array mit den Namen der Views bzw. false im Fehlerfall
     */
    public function listViews() {}
    /**
     * Methode liefert die Namen der Felder der angegebenen Tabelle zurück.
     * Im Fehlerfall liefert die Methode false zurück.
     * @param string $tableName Name der Tabelle
     * @param string $schemaTableSeparator String containing the separator of table schema and table name
     * @return mixed Array mit den Namen der Felder bzw. false im Fehlerfall
     */
    public function listTableFields($tableName, $schemaTableSeparator) {}
    /**
     * Methode liefert die Constraints der angegebenen Tabelle zurück.
     * Im Fehlerfall liefert die Methode false zurück.
     * @param string $tableName Name der Tabelle
     * @return    mixed    Array mit den Namen der Constraints bzw. false im Fehlerfall
     */
    public function listTableConstraints($tableName) {}
    /**
     * Methode liefert die Definition der angegebenen Constraint zurück.
     * Im Fehlerfall liefert die Methode false zurück.
     * @param string $tableName Name der Tabelle
     * @param string $constraintName Name der Constraint
     * @return    mixed    Array mit Definition bzw. false im Fehlerfall
     * @throws \JobRouterException
     */
    public function getTableConstraintDefinition($tableName, $constraintName) {}
    /**
     * @param $tableName
     * @param $columnName
     * @param bool $returnAsArray
     * @return bool|mixed
     * @throws \JobRouterException
     */
    public function getSqlSrvTableColumnFlags($tableName, $columnName, $returnAsArray=false) : bool {}
    /**
     * Methode liefert die Indices der angegebenen Tabelle zurück.
     * Im Fehlerfall liefert die Methode false zurück.
     * @param string $tableName Name der Tabelle
     * @return    mixed    Array mit den Namen der Indices bzw. false im Fehlerfall
     */
    public function listTableIndexes($tableName) {}
    /**
     * List all tables in the current database.
     * @return mixed array of table names on success, false on failure
     */
    public function listTables() {}
    /**
     * List all tables in the current database including schemas
     * @return mixed array of table names on success, false on failure
     */
    public function listTablesWithSchema() {}
    /**
     * Methode liefert die Definition eine Feldes einer Tabelle zurück.
     * Im Fehlerfall wirft die Methode eine JobRouterException.
     * Beispiel des zurückgelieferten Arrays:
     * Array(
     *        [0] => Array(
     *            [notnull] => 1
     *            [nativetype] => varchar
     *            [length] => 50
     *            [fixed] =>
     *            [default] =>
     *            [collate] => utf8_general_ci
     *            [charset] => utf8
     *            [type] => text
     *            [mdb2type] => text
     *        )
     * )
     * @param string $tableName Name der Tabelle
     * @param string $fieldName Name des Feldes
     * @param string $schemaTableSeparator String containing the separator of table schema and table name
     * @return array Array mit der Felddefinition
     * @throws \JobRouterException
     */
    public function getTableFieldDefinition($tableName, $fieldName, $schemaTableSeparator) : array {}
    /**
     * Konvertiert den übergebenen Wert in ein DBMS-spezifisches Format, das sich für Query-Statements eignet.
     * @param $value string zu konvertierender Wert
     * @param $type string Typ, in den der Wert konvertiert werden soll
     * @return string konvertierter Wert
     * @throws \JobRouterException
     */
    public function quote(string $value, string $type) : string {}
    /**
     * Quotet den übergebenen Bezeichner (z. B. Feld- oder Tabellenname), so dass
     * er sicher verwendet werden kann. Das Quoting erfolgt dabei DBMS-spezifisch.
     * @param string $identifier Bezeichner (z. B. Feld- oder Tabellenname), der
     *                                geqoutet werden soll
     * @return    string    gequoteter Bezeichner (z. B. Feld- oder Tabellenname)
     */
    public function quoteIdentifier($identifier) : string {}
    /**
     * Methode liefert den aktuellen Zeitpunkt in einem DBMS-spezifischen Format zurück.
     * @param string $type 'timestamp', 'time', oder 'date'
     * @return    string    aktueller Zeitpunkt im gewünschten Format
     */
    public function now($type='timestamp') : string {}
    /**
     * @inheritDoc
     */
    public function beginTransaction(\JobRouter\Log\LogInfoInterface $logInfo, $loggingEnabled=true) {}
    /**
     * Starts a transaction by suspending auto-commit mode with boolean as return value
     * @param \JobRouter\Log\LogInfoInterface|null $logInfo
     * @param bool $loggingEnabled
     * @return bool TRUE if a transaction is already started, FALSE in error case.
     */
    public function beginTransactionMdb2(\JobRouter\Log\LogInfoInterface $logInfo, $loggingEnabled=true) : bool {}
    /**
     * {@inheritdoc}
     */
    public function rollback() {}
    /**
     * {@inheritdoc}
     */
    public function commit() {}
    /**
     * Commits the current transaction with bool as return value.
     * @param \JobRouter\Log\LogInfoInterface|null $logInfo
     * @param bool $loggingEnabled
     * @return bool
     */
    public function commitMdb2(\JobRouter\Log\LogInfoInterface $logInfo, $loggingEnabled=true) : bool {}
    /**
     * {@inheritdoc}
     */
    public function inTransaction() : bool {}
    /**
     * Methode liefert den zuletzt aufgetretenen Fehler zurück.
     * @return    string    Fehlermeldung des zuletzt aufgetretenen Fehlers
     */
    public function getErrorMessage() : string {}
    /**
     * Methode liefert die Version des Datenbankservers zurück.
     * @return    array    Version des Datenbankservers
     */
    public function getVersion() : array {}
    /**
     * Methode schließt die Datenbankverbindung.
     * Liefert true, wenn die Verbindung geschlossen wurde. Im Fehlerfall, oder wenn keine
     * Verbindung geöffnet war, liefert die Methode false zurück.
     * @param bool $force Flag, um das Schließen persistenter Verbindungen zu erzwingen
     * @return bool true, wenn die Verbindung geschlossen wurde, false in Fehlerfall
     */
    public function closeConnection($force=true) : bool {}
    /**
     * Methode liefert MDB2-Objekt zurück.
     * @return mixed MDB2-Objekt
     */
    public function getDB() {}
    /**
     * Returns the definition of a table field contained in an MDB2 result object.
     * Please note: field names are returned StringUtility::toLower()
     * Example of a returned Array.
     * Array(
     *        [0] => Array(
     *            [table] => ''
     *            [name] => test
     *            [type] => char
     *            [length] => 50
     *            [flags] => ''
     *            [mdb2type] => xxx
     *        )
     * )
     * @param \JobRouter\Common\Database\Result $result Object returned from query() method
     * @return array Field definition
     * @throws \JobRouterException
     */
    public function getTableInfo(\JobRouter\Common\Database\Result $result) : array {}
    /**
     * Returns number of rows of the last query
     * @param \JobRouter\Common\Database\ResultInterface $result
     * @return int Number of rows
     */
    public function getNumRows($result) : int {}
    /**
     * Replaces the field data types returned by tableInfo() with
     * the common data types.
     * @param mixed $tableInfo
     */
    public function replaceReturnTypesWithCommonDataType(&$tableInfo) {}
    /**
     * {@inheritdoc}
     */
    public function tableExists($tableName) : bool {}
    /**
     * Indicates if a table has an given index
     * @param string $tableName
     * @param string $indexName
     * @return    boolean    true if index exists or false if not
     */
    public function tableHasIndex($tableName, $indexName) : bool {}
    /**
     * Indicates if a table has a specific column
     * @param string $tableName
     * @param string $columnName
     * @return    boolean    true if column exists or false if not
     */
    public function tableHasColumn($tableName, $columnName) : bool {}
    /**
     * Indicates if a table has an given constraint
     * @param string $tableName
     * @param string $constraintName
     * @return    boolean    true if constraint exists or false if not
     */
    public function tableHasConstraint($tableName, $constraintName) : bool {}
    public function setLimit($limit, $offset) {}
    /**
     * Prepares a SQL statement for later execution.
     * @param string $query
     * @param array $types
     * @param mixed $resultTypes
     * @param \JobRouter\Log\LogInfoInterface $logInfo
     * @param bool $loggingEnabled
     * @return \JobRouter\Common\Database\StatementInterface|false
     */
    public function prepare($query, array $types, $resultTypes, \JobRouter\Log\LogInfoInterface $logInfo, $loggingEnabled=true) {}
    /**
     * @param string $sql
     * @param array $params
     * @param array $types
     * @param \JobRouter\Log\LogInfoInterface $logInfo
     * @return mixed
     * @throws \JobRouterException
     */
    public function preparedSelect(string $sql, array $params, array $types, \JobRouter\Log\LogInfoInterface $logInfo) {}
    /**
     * @param string $sql
     * @param array $params
     * @param array $types
     * @param \JobRouter\Log\LogInfoInterface $logInfo
     * @return mixed
     * @throws \JobRouterException
     */
    public function preparedExecute(string $sql, array $params, array $types, \JobRouter\Log\LogInfoInterface $logInfo) {}
    /**
     * Executes a prepared SQL statement.
     * @param \JobRouter\Common\Database\StatementInterface $stmt
     * @param array $params
     * @param \JobRouter\Log\LogInfoInterface $logInfo
     * @param bool $loggingEnabled
     * @return mixed
     */
    public function execute( $stmt, array $params, \JobRouter\Log\LogInfoInterface $logInfo, $loggingEnabled=true) {}
    public function getConnectionType() {}
    public function lastInsertId($table, $field) : string {}
    /**
     * Hilfsmethode - Schreibt die SQL-Anfrage in eine Anfrage der
     * Form "SELECT COUNT(*)" um.
     * @param string $query SQL-Anfrage, die umgeschrieben werden soll
     * @return    string    umgeschriebene SQL-Anfrage bzw. false, wenn die
     *                    Anfrage nicht umgeschrieben werden konnte
     */
    public function rewriteCountQuery($query) : string {}
    /**
     * @param $result \JobRouter\Common\Database\ResultInterface
     */
    public function free( $result) {}
    public function setPagingOptLevel($pagingOptLevel) {}
    /**
     * @inheritDoc
     */
    public function getDbType() : int {}
    /**
     * @param $tableName
     * @param $column
     * @return mixed
     * @throws \JobRouterException
     */
    public function createFulltextIndex($tableName, $column) {}
    public function disableWarningsReturnAsErrors() {}
    public function restoreWarningsReturnAsErrors() {}
    /**
     * @inheritDoc
     */
    public function withTransaction(callable $workload) {}
    /**
     * @param $fieldOne
     * @param $operator
     * @param $fieldTwo
     * @return string
     * @throws \JobRouterException
     */
    public function compareCaseInsensitive($fieldOne, $operator, $fieldTwo) : string {}
    public function createQueryBuilder() {}
    /**
     * @inheritDoc
     */
    public function serialize() {}
    /**
     * @inheritDoc
     */
    public function unserialize($serialized) {}
    public function __debugInfo() {}
    protected function convertToConnectionCharset($value) {}
    protected function convertToJobRouterCharset($value) {}
}
/**
 * This class handles the management of JobRouter modules. It is responsible for the creation of
 * the module menu, i.e. the dialog for the settings and it contains the information that goes into
 * the navigation of the JobRouter client.
 */
abstract class SystemActivity implements ISystemActivity, JobRouter\Application\Service\ServiceAwareInterface {
    public const SOURCETYPE_EMPTY = 0;
    public const SOURCETYPE_TABLE = 1;
    public const SOURCETYPE_SUBTABLE = 2;
    public const SOURCETYPE_FIX_VALUE = 3;
    public const STATUS_ERROR = -1;
    public const STATUS_FIRST_EXECUTION = 0;
    public const STATUS_PENDING = 1;
    public const STATUS_COMPLETED = 99;
    public const ACTIVITY_TYPE_PHP = 0;
    public const ACTIVITY_TYPE_NON_PHP = 1;
    protected $returnCodeField;
    protected $errorMessageField;
    protected $errorMessageIsMapped = false;
    protected $userdefinedParametersNode;
    protected $inputParametersNode;
    protected $outputParametersNode;
    /**
     * Array containing selected values from module settings, either from POST-data
     * or from an already saved transfer xml.
     * @var array
     */
    protected $activityDialogData;
    /**
     * Step object which calls this system activity.
     * @var \Step|null
     */
    protected $step;
    /** @var string */
    protected $processName;
    /**
     * Process version
     * @var string
     */
    protected $version;
    /**
     * Step number
     * @var string
     */
    protected $stepNumber;
    /** @var null|\JobRouter\Application\Container */
    protected $services;
    /**
     * Disables the implicit cast of empty decimal values to 0.
     * Set this to true if you have "required" checks where you need to differentiate between "empty" and 0.
     * @var boolean
     */
    protected $disableCastOfEmptyDecimalValue;
    /**
     * The actual SystemActivity Object which extends the SystemActivity or AbstractSystemActivityAPI.
     * @var SystemActivity|\AbstractSystemActivityAPI
     */
    protected $activity;
    protected $subtableFilesToDelete = [];
    protected $processTableFileToDelete;
    protected $hint;
    /**
     * JobRouter database connection object
     * @var \JobDB
     */
    protected static $jobDB;
    public function __construct(\Step $step) {}
    public function getActivityType() {}
    public function getProcessName() {}
    public function getProcessVersion() {}
    public function getStepNumber() {}
    public function getProcessId() {}
    /**
     * Shows the menu for the activity dialog once an activity is selected.
     * Dialog information will be retreived from the activity xml (structure) and
     * the transfer xml (content) that will be stored in the database once the activity
     * has been worked on and saved.
     * @param string $processName - process name
     * @param string $version - process version
     * @param int $step - process step
     * @return string - HTML representation of the activity dialog
     * @throws \JobRouterException
     */
    public final function editSettings($processName, $version, $step) : string {}
    public final function isBatchFunctionSelected() {}
    public final function passDialogXml() {}
    public final function getSettings($processName, $version, $step) {}
    /**
     * Dummy implementation for getting a human readable status message for the given step status.
     * Please overwrite in subclasses.
     * @return string
     */
    public function getStatusText() : string {}
    /**
     * Dummy implementation for getting a human readable debug message.
     * Please overwrite in subclasses.
     * @return string
     */
    public function getDebugText() : string {}
    public final function getIdWithPrefix($id) {}
    /**
     * Saves the settings from the module dialog to a transfer xml
     * that is read whenever the process step is executed. The transfer
     * xml contains all mappings between module variables (input, output,
     * simulation, configuration, etc.) and process fields (process table
     * and subtables).
     * @param string $processName - process name
     * @param string $version - process version
     * @param int $step - process step
     * @throws \JobRouterException
     */
    public final function saveSettings($processName, $version, $step) {}
    public function getActivityIcon() {}
    public function getContentOfUserDefinedParameter($parameterID, $elementID) {}
    public function getContentOfUDParameter($parameterID, $elementID) {}
    public function getContentOfUserDefinedSetting($settingID, $settingName='', $settingDesc='') {}
    public function getOnChangeOfUserDefinedParameter($parameterID, $elementID) {}
    public function getUserDefinedScripts() {}
    public function getUDScripts() {}
    public function getHiddenFields() {}
    public function getReturnCodeField() {}
    public function getErrorMessageField() {}
    public function getTabTitle($id) {}
    public function getTabInfo($id) {}
    public function getHeaderLabel($tabId, $columnId, $elementId='') {}
    /**
     * Returns the xml that defines the structure of the batch
     * dialog, i.e. the available functions and their input and output
     * parameters, configuration, simulation settings, etc...
     * @return String - xml
     */
    public function getBatchXml() : String {}
    public function getSelectedModuleVersion() {}
    public function setServices(JobRouter\Application\Container $services) {}
    /**
     * @throws \JobRouterException
     */
    public function resolveSignInputParameters() {}
    /**
     * @param $fieldId string
     * @return string
     * @throws \JobRouterException
     */
    public function getInputParameterSourceTypeById(string $fieldId) : string {}
    /**
     * @param $fieldId string
     * @return string
     * @throws \JobRouterException
     */
    public function getOutputParameterSourceTypeById(string $fieldId) : string {}
    /**
     * @param $fieldId string
     * @return mixed
     * @throws \JobRouterException
     */
    public function getPosDataNodeById(string $fieldId) : mixed {}
    public final function getFunctionHint() : ?string {}
    public final function setFunctionHint(string $hint) : void {}
    public abstract function execute();
    public abstract function isLicensed();
    public abstract function getActivityId();
    public abstract function getActivityName();
    public abstract function getActivityDescription();
    public static function getImagePath() {}
    public static function getLanguagePath() {}
}
/**
 * Class to declare SystemActivity methods as final.
 * Layer needed between SystemActivity and API.
 */
class ProxySystemActivity extends SystemActivity implements \JobRouter\Application\Service\ServiceAwareInterface, \ISystemActivity {
    public const SOURCETYPE_EMPTY = 0;
    public const SOURCETYPE_TABLE = 1;
    public const SOURCETYPE_SUBTABLE = 2;
    public const SOURCETYPE_FIX_VALUE = 3;
    public const STATUS_ERROR = -1;
    public const STATUS_FIRST_EXECUTION = 0;
    public const STATUS_PENDING = 1;
    public const STATUS_COMPLETED = 99;
    public const ACTIVITY_TYPE_PHP = 0;
    public const ACTIVITY_TYPE_NON_PHP = 1;
    protected $returnCodeField;
    protected $errorMessageField;
    protected $errorMessageIsMapped = false;
    protected $userdefinedParametersNode;
    protected $inputParametersNode;
    protected $outputParametersNode;
    /**
     * Array containing selected values from module settings, either from POST-data
     * or from an already saved transfer xml.
     * @var array
     */
    protected $activityDialogData;
    /**
     * Step object which calls this system activity.
     * @var \Step|null
     */
    protected $step;
    /** @var string */
    protected $processName;
    /**
     * Process version
     * @var string
     */
    protected $version;
    /**
     * Step number
     * @var string
     */
    protected $stepNumber;
    protected $services;
    /**
     * Disables the implicit cast of empty decimal values to 0.
     * Set this to true if you have "required" checks where you need to differentiate between "empty" and 0.
     * @var boolean
     */
    protected $disableCastOfEmptyDecimalValue;
    /**
     * The actual SystemActivity Object which extends the SystemActivity or AbstractSystemActivityAPI.
     * @var \SystemActivity|\AbstractSystemActivityAPI
     */
    protected $activity;
    protected $subtableFilesToDelete = [];
    protected $processTableFileToDelete;
    protected $hint;
    /**
     * JobRouter database connection object
     * @var \JobDB
     */
    protected static $jobDB;
    /**
     * Overrides and new methods
     */
    public final function isLicensed() {}
    public function getActivityName() {}
    public function getActivityDescription() {}
    public function getActivityId() {}
    public function getDialogXml() {}
    public final function getContentOfUDSetting($settingID, $settingName='', $settingDesc='') {}
    public final function execute() {}
    public final function __construct( \Step $step, \AbstractSystemActivityAPI $apiActivity) {}
    public final function getActivityIcon() {}
    public final function log($message, $level) {}
    public final function resolveInputParameter($fieldId) {}
    public final function resolveInputParameterPosdataValues($posdataId) {}
    public final function resolveInputParameterAllPosdataValues() {}
    public final function resolveInputParameterListValues($listId, $keepNulls=false) {}
    public final function resolveInputParameterListValuesAsArray($listId) {}
    public final function resolveInputParameterListAttributes($listId) {}
    public final function resolveOutputParameterListValues($listId) {}
    public final function resolveOutputParameterListAttributes($listId) {}
    public final function storeOutputParameter($fieldId, $value) {}
    public final function resolveInputParameterAttribute($fieldId, $attributeName) {}
    public final function resolveOutputParameterAttribute($fieldId, $attributeName) {}
    public final function getFixSubtableName() {}
    public final function setTableValue($fieldname, $value) {}
    public final function getTableValue($fieldname, $formatValue=false, $sysFormat=false, $rawValue=false) {}
    public final function getSubtableValue($subtable, $row, $fieldname, $formatValue=false, $rawValue=false) {}
    public final function setSubtableValue($subtable, $row, $fieldname, $value) {}
    public final function markActivityAsCompleted() {}
    public final function markActivityAsPending() {}
    public final function isFirstExecution() {}
    public final function isPending() {}
    public final function isCompleted() {}
    public final function clearSubtable($subtable, $deleteAttachedFiles=false) {}
    public final function getMaxSubtableRowId($subtable) {}
    public final function setSystemActivityVar($varKey, $varValue) {}
    public final function getSystemActivityVar($varKey, $defaultValueIfUnset) {}
    public final function getUDL($udl, $elementId) {}
    public final function resolveParameterAsNodeByFieldId($parameterType, $fieldId) {}
    public final function resolveParameterListAsNodeByListId($parameterType, $listId) {}
    public final function resolveUserDefinedParameterAttribute($udfieldId, $attributeName) {}
    public final function resolveDomNodeListToArray(\DOMNodeList $listNodes, $keepNulls=false) {}
    public final function resolveListParameterValueByDOMNodeProxy(\DOMElement $listNode) {}
    public final function resolveDomNodeListToAttributes(\DOMNodeList $listNodes) {}
    public final function getStepStatus() {}
    public final function setStepStatus($stepStatus) {}
    public final function attachFile($fieldname, $filepath) {}
    public final function attachSubtableFile($subtableName, $rowId, $fieldName, $filePath) {}
    public final function getTableFieldType($fieldName) {}
    public final function getSubtableFieldType($subtable, $fieldName) {}
    public final function getSubtableCount($subtable) {}
    public final function getSubtableRowIds($subtable) {}
    public final function replaceValue($value) {}
    public final function getContentOfUDParameter($parameterID, $elementID) {}
    public final function getOnChangeOfUDParameter($parameterID, $elementID) {}
    public final function getUDScripts() {}
    public final function addHiddenField($name, $value) {}
    public final function getSPIDisplayInfos() {}
    public final function getSPIFields() {}
    public final function getConstant($constantName) {}
    public final function isUDFieldFromWorktable($id) {}
    public final function getLists(\DOMNodeList $listNodes, \DOMXPath $xpath) {}
    public final function readSettings() {}
    public final function getParameterValue($sourceType, $field, $subtable='', $row='', $datatype='', $keepNulls=false) {}
    public final function setParameterValue($settings, $data) {}
    public final function setReturnCodeAndMessage($returnCode, $errorMessage='') {}
    public final function getFieldType($sourceType, $fieldName, $subtable='') {}
    public final function getTabTitle($id) {}
    public final function getTabInfo($id) {}
    public final function getHeaderLabel($tabId, $columnId, $elementId='') {}
    public final function executeSelectedFunctionOrSimulation() {}
    public final function isErrorOrSuccessSimulation() {}
    public final function executeErrorOrSuccessSimulation() {}
    public final function executeSuccessSimulation() {}
    public final function executeErrorSimulation() {}
    /**
     * @throws \JobRouterException
     * @throws \Throwable
     */
    public final function executeSelectedFunction() {}
    public final function resetReturnCodeAndMessage() {}
    public final function readSettingsToXpath() {}
    public final function initActivitySettingsFromXpath() {}
    public final function initPropertyNamespaceForFunctionId() {}
    public final function destroyPropertyNamespace() {}
    public final function hasProperty($propertyKey) {}
    public final function setProperty($propertyKey, $propertyValue) {}
    public final function getProperty($propertyKey) {}
    public final function removeProperty($propertyKey) {}
    public final function executeMethodForSubtable($method, $subtableName) {}
    public final function ensureSubtableIsNotUsed() {}
    public final function resolveParameterValueByDOMNode(\DOMElement $parameterNode, $keepNulls=false) {}
    public final function storeParameterValueByDOMNode(\DOMElement $parameterNode, $fieldValue) {}
    public final function getSettingsXpath() {}
    public final function getSelectedFunction() {}
    public final function getSelectedFunctionId() {}
    public final function removeSystemActivityVar($varKey) {}
    public final function deleteSystemActivityVars() {}
    public final function saveSystemActivityVars() {}
    public final function loadSystemActivityVars() {}
    public final function loadSystemActivityVarsForFunction($functionId) {}
    public final function updateTablesFromSystemActivityVars() {}
    public final function getFixSubtableListbox($required=false) {}
    public final function deleteFile($fieldName) {}
    public final function deleteSubtableFile($fieldName) {}
    public final function ensureInTransaction() {}
    public final function commitIfNewTransaction() {}
    public final function rollbackIfNewTransaction() {}
    public final function disableCastOfEmptyDecimalValueProxy() {}
    public final function getCurrentSubtableRowId() {}
    public final function getCurrentSubtable() {}
    public final function getServices() {}
    public function getActivityType() {}
    public function getProcessName() {}
    public function getProcessVersion() {}
    public function getStepNumber() {}
    public function getProcessId() {}
    /**
     * Returns MenuGenerator
     * @return mixed
     */
    public function getMenuGenerator() {}
    /**
     * Dummy implementation for getting a human readable status message for the given step status.
     * Please overwrite in subclasses.
     * @return string
     */
    public function getStatusText() : string {}
    /**
     * Dummy implementation for getting a human readable debug message.
     * Please overwrite in subclasses.
     * @return string
     */
    public function getDebugText() : string {}
    public function getContentOfUserDefinedParameter($parameterID, $elementID) {}
    public function getContentOfUserDefinedSetting($settingID, $settingName='', $settingDesc='') {}
    public function getOnChangeOfUserDefinedParameter($parameterID, $elementID) {}
    public function getUserDefinedScripts() {}
    public function getHiddenFields() {}
    public function getReturnCodeField() {}
    public function getErrorMessageField() {}
    /**
     * Returns the xml that defines the structure of the batch
     * dialog, i.e. the available functions and their input and output
     * parameters, configuration, simulation settings, etc...
     * @return String - xml
     */
    public function getBatchXml() : String {}
    public function getSelectedModuleVersion() {}
    public function setServices(\JobRouter\Application\Container $services) {}
    /**
     * @throws \JobRouterException
     */
    public function resolveSignInputParameters() {}
    /**
     * @param $fieldId string
     * @return string
     * @throws \JobRouterException
     */
    public function getInputParameterSourceTypeById(string $fieldId) : string {}
    /**
     * @param $fieldId string
     * @return string
     * @throws \JobRouterException
     */
    public function getOutputParameterSourceTypeById(string $fieldId) : string {}
    /**
     * @param $fieldId string
     * @return mixed
     * @throws \JobRouterException
     */
    public function getPosDataNodeById(string $fieldId) : mixed {}
    protected function executeSystemActivity($systemActivity) {}
    protected function ensureSystemActivityExecutionMethodIsDefined($systemActivity) {}
    protected function isPreventFunctionIdCallDefined($systemActivity) {}
    protected function isSelectedFunctionIdMethodDefined($systemActivity) {}
    protected function handleSystemActivityVars() {}
    protected function deleteFiles() {}
    protected function __callProtected($methodName) {}
    protected final function resolveListParameterValueByDOMNode(\DOMElement $listNode, $keepNulls) {}
    protected function storeOutputParameterArrayValueByNodeName(array $values, string $nodeName) {}
    protected function resolveParameterPosfieldAsNodeByPosdataId($parameterType, $posdataId) {}
    protected function resolveInputParameterAllPosdataAsNode() {}
    protected final function disableCastOfEmptyDecimalValue() {}
    protected function getTableFields() : array {}
    protected function getSubtableFields() : array {}
    public static function getImagePath() {}
    public static function getLanguagePath() {}
}
class JobRouterException extends \Exception implements \Throwable {

    protected $message = '';
    protected $code = 0;
    protected $file;
    protected $line;
    public function __construct($message, $code=0, \Throwable $previous) {}
}
abstract class AbstractSystemActivityAPI implements \ISystemActivity
{
    /** @var ProxySystemActivity */
    private $proxyActivity;
    public final function __construct() {}
    public final function setProxySystemActivity( \ProxySystemActivity $systemActivity ) {}
    public final function getReturnCodeField() {}
    public final function getErrorMessageField() {}
    public final function passDialogXml() {}
    public final function isLicensed() {}
    public final function execute() {}
    public final function isPreventFunctionIdCallDefined() {}
    public final function getMenuGenerator() {}
    public final function getDebugText() {}
    public function getActivityType() {}
    public final function getProcessName() {}
    public final function getProcessVersion() {}
    public final function getStepNumber() {}
    public final function getProcessId() {}
    public function getBatchXML() {}
    public final function editSettings( $processName, $version, $step ) {}
    public final function saveSettings( $processName, $version, $step ) {}
    public final function getSettings( $processName, $version, $step ) {}
    public final function isBatchFunctionSelected() {}
    public final function getIdWithPrefix( $id ) {}
    /**
     * Get id of activity
     * @return string
     */
    public function getActivityId() : string {}
    /**
     * Get current status as text
     * @return string
     */
    public function getStatusText() : string {}
    /**
     * Write debug messages to file in output directory (<activityid>.log)
     *
     * @param string $message
     */
    public final function debug( $message ) {}
    /**
     * Write error messages to file in output directory (<activityid>.log)
     *
     * @param string $message
     */
    public final function error( $message ) {}
    /**
     * Resolve an input parameter from database in process- or subtable context
     *
     * @param string $fieldId
     *
     * @return string
     */
    public final function resolveInputParameter( $fieldId ) : string {}
    /**
     * Resolve an input parameter posdata from database to key value pair array in
     * process- or subtable context
     *
     * @param string $posdataId
     *
     * @return array
     */
    public final function resolveInputParameterPosdataValues( $posdataId ) : array {}
    /**
     * Resolve an input parameter posdata elements two-dimensional array
     * from database to key value pair array in process- or subtable context
     *
     * @return array
     */
    public final function resolveInputParameterAllPosdataValues() : array {}
    /**
     * Resolve an input parameter list from database to key value pair array in
     * process- or subtable context
     *
     * @param string $listId
     *
     * @return array
     */
    public final function resolveInputParameterListValues( $listId ) : array {}
    /**
     * Resolve an input parameter list from database to key value pair array in
     * process- or subtable context, in contrast to resolveInputParameterListValues
     * it resolves all values as numeric array containing only the values
     *
     * @param string $listId
     *
     * @return array
     */
    public final function resolveInputParameterListValuesAsArray( $listId ) : array {}
    /**
     * Resolve an input parameter list from database to a twodimensional array with
     * all attributes in process- or subtable context
     *
     * @param string $listId
     *
     * @return array
     */
    public final function resolveInputParameterListAttributes( $listId ) : array {}
    /**
     * Resolve an output parameter list from database to key value pair array in
     * process- or subtable context
     *
     * @param string $listId
     *
     * @return array
     */
    public final function resolveOutputParameterListValues( $listId ) : array {}
    /**
     * Resolve an output parameter list from database to a twodimensional array with
     * all attributes in process- or subtable context
     *
     * @param string $listId
     *
     * @return array
     */
    public final function resolveOutputParameterListAttributes( $listId ) : array {}
    /**
     * Store an output parameter to database in process- or subtable context
     *
     * @param $fieldId
     * @param $value
     */
    public final function storeOutputParameter( $fieldId, $value ) {}
    /**
     * Resolve a specific attribute for an input parameter
     *
     * @param $fieldId
     * @param $attributeName
     *
     * @return string
     */
    public final function resolveInputParameterAttribute( $fieldId, $attributeName ) : string {}
    /**
     * Resolve a specific attribute for an output parameter
     *
     * @param $fieldId
     * @param $attributeName
     *
     * @return string
     */
    public final function resolveOutputParameterAttribute( $fieldId, $attributeName ) : string {}
    /**
     * If there is a fixSubtable configured, its name is returned
     *
     * @return string
     */
    public final function getFixSubtableName() : string {}
    /**
     * Set a process table value
     *
     * @param string $fieldname
     * @param string $value
     *
     * @throws \JobRouterException
     */
    public final function setTableValue( $fieldname, $value ) {}
    /**
     * Get a subtable value
     *
     * @param string $subtable
     * @param string $row
     * @param string $fieldname
     *
     * @return mixed
     * @throws \JobRouterException
     */
    public final function getSubtableValue( $subtable, $row, $fieldname ) : mixed {}
    /**
     * Set a subtable value
     *
     * @param string $subtable
     * @param int $row
     * @param string $fieldname
     * @param string $value
     *
     * @throws \JobRouterException
     */
    public final function setSubtableValue( $subtable, $row, $fieldname, $value ) {}
    /**
     * Mark a system activity step as completed (stepStatus=99)
     */
    public final function markActivityAsCompleted() {}
    /**
     * Mark a system activity step as pending (stepStatus=1)
     */
    public final function markActivityAsPending() {}
    /**
     * Check for first execution of a system activity (stepStatus=0)
     */
    public final function isFirstExecution() {}
    /**
     * Check for pending status of a system activity (stepStatus=1)
     */
    public final function isPending() {}
    /**
     * Check for completed status of a system activity (stepStatus=99)
     */
    public final function isCompleted() {}
    /**
     * Delete all entries of a subtable
     *
     * @param $subtable
     */
    public final function clearSubtable( $subtable ) {}
    /**
     * Get id of last inserted row in subtable
     *
     * @param $subtable
     *
     * @return int|mixed
     */
    public final function getMaxSubtableRowId( $subtable ) : int {}
    public final function getActivityIcon() {}
    /**
     * Get upload path
     *
     * @return string
     * @throws \JobRouterException
     */
    public final function getUploadPath() : string {}
    /**
     * Get temp path
     *
     * @return string
     * @throws \JobRouterException
     */
    public final function getTempPath() : string {}
    /**
     * Store a variable persistent (until activity is completed, if persistence for
     * more than one execution of the activity is needed)
     *
     * @param $varKey
     * @param $varValue
     */
    public final function setSystemActivityVar( $varKey, $varValue ) {}
    /**
     * Get a variable, that is stored peristent (until activity is completed, if persistence for
     * more than one execution of the activity is needed)
     *
     * @param $varKey
     * @param null $defaultValueIfUnset
     *
     * @return null
     */
    public final function getSystemActivityVar( $varKey, $defaultValueIfUnset ) : null {}
    /**
     * Returns the version of the system activity
     */
    public final function getSelectedModuleVersion() {}
    /**
     * Returns a singleton instance of JobRouter db connection
     *
     * @return \JobRouter\Common\Database\ConnectionInterface
     * @throws \JobRouterException
     */
    public final function getJobDB() : \JobRouter\Common\Database\ConnectionInterface {}
    /**
     * Returns an array of list items for user defined lists by elementId and udl-Attribute in form [["name" => "Option Label", "value" => "Option Value"]]
     *
     * @return array
     */
    public function getUDL( $udl, $elementId ) : array {}
    public function getContentOfUserDefinedParameter( $parameterID, $elementID ) {}
    public final function getContentOfUserDefinedSetting( $settingID, $settingName = '', $settingDesc = '' ) {}
    public function getOnChangeOfUserDefinedParameter( $parameterID, $elementID ) {}
    public function getUserDefinedScripts() {}
    public function getUDScripts() {}
    public function getHiddenFields() {}
    public final function getTabTitle( $id ) {}
    public final function getTabInfo( $id ) {}
    public final function getHeaderLabel( $tabId, $columnId, $elementId = '' ) {}
    public final function executeFunction( $function, $parameter ) {}
    public final function getLicenseService() {}
    public final function getValidator() {}
    public final function __callProtected( $methodName ) {}
    public final function getFunctionHint() : ?string {}
    public final function setFunctionHint( string $hint ) : void {}
    public abstract function getActivityName();
    public abstract function getActivityDescription();
    protected abstract function getDialogXml();
    protected final function getStepStatus() {}
    protected final function setStepStatus( $stepStatus ) {}
    protected final function attachFile( $fieldname, $filepath ) {}
    protected final function attachSubtableFile( $subtableName, $rowId, $fieldName, $filePath ) {}
    /**
     * Get a process table value
     *
     * @param string $fieldname
     *
     * @param bool $rawValue
     *
     * @return mixed
     * @throws \JobRouterException
     */
    protected final function getTableValue( $fieldname, $rawValue = false ) : mixed {}
    protected final function getTableFieldType( $fieldName ) {}
    protected final function getSubtableFieldType( $subtable, $fieldName ) {}
    protected final function getSubtableCount( $subtable ) {}
    protected final function getSubtableRowIds( $subtable ) {}
    protected final function replaceValue( $value ) {}
    protected final function removeSystemActivityVar( $varKey ) {}
    protected final function getContentOfUDSetting( $settingID, $settingName = '', $settingDesc = '' ) {}
    protected final function getOnChangeOfUDParameter( $parameterID, $elementID ) {}
    protected final function addHiddenField( $name, $value ) {}
    protected final function getSPIDisplayInfos() {}
    protected final function getSPIFields() {}
    protected final function getConstant( $constantName ) {}
    protected final function isUDFieldFromWorktable( $id ) {}
    protected final function getLists( DOMNodeList $listNodes, DOMXPath $xpath ) {}
    protected final function readSettings() {}
    protected final function getParameterValue( $sourceType, $field, $subtable = '', $row = '', $datatype = '' ) {}
    protected final function setParameterValue( $settings, $data ) {}
    protected final function setReturnCodeAndMessage( $returnCode, $errorMessage = '' ) {}
    protected final function getFieldType( $sourceType, $fieldName, $subtable = '' ) {}
    protected final function executeSelectedFunctionOrSimulation() {}
    protected final function isErrorOrSuccessSimulation() {}
    protected final function executeErrorOrSuccessSimulation() {}
    protected final function executeSuccessSimulation() {}
    protected final function executeErrorSimulation() {}
    protected final function executeSelectedFunction() {}
    protected final function ensureInTransaction() {}
    protected final function commitIfNewTransaction() {}
    protected final function rollbackIfNewTransaction() {}
    protected final function resetReturnCodeAndMessage() {}
    protected final function readSettingsToXpath() {}
    protected final function initActivitySettingsFromXpath() {}
    protected final function initPropertyNamespaceForFunctionId() {}
    protected final function destroyPropertyNamespace() {}
    protected final function hasProperty( $propertyKey ) {}
    protected final function setProperty( $propertyKey, $propertyValue ) {}
    protected final function getProperty( $propertyKey ) {}
    protected final function removeProperty( $propertyKey ) {}
    protected final function executeMethodForSubtable( $method, $subtableName ) {}
    protected final function ensureSubtableIsNotUsed() {}
    protected final function resolveParameterValueByDOMNode( DOMElement $parameterNode ) {}
    protected final function resolveDomNodeListToArray( DOMNodeList $listNodes ) {}
    protected final function resolveListParameterValueByDOMNode( DOMElement $listNode ) {}
    protected final function storeParameterValueByDOMNode( DOMElement $parameterNode, $fieldValue ) {}
    protected final function getSettingsXpath() {}
    /**
     * @return string
     */
    protected final function getSelectedFunction() : string {}
    protected final function getSelectedFunctionId() {}
    protected final function deleteSystemActivityVars() {}
    protected final function saveSystemActivityVars() {}
    protected final function loadSystemActivityVars() {}
    protected final function loadSystemActivityVarsForFunction( $functionId ) {}
    protected final function updateTablesFromSystemActivityVars() {}
    protected final function getFixSubtableListbox( $required = false ) {}
    protected final function deleteFile( $fieldName ) {}
    protected final function deleteSubtableFile( $fieldName ) {}
    protected final function log( $message, $level ) {}
    protected final function resolveParameterAsNodeByFieldId( $parameterType, $fieldId ) {}
    protected final function resolveParameterListAsNodeByListId( $parameterType, $listId ) {}
    protected final function resolveUserDefinedParameterAttribute( $udfieldId, $attributeName ) {}
    protected final function resolveDomNodeListToAttributes( DOMNodeList $listNodes ) {}
    protected final function disableCastOfEmptyDecimalValue() {}
    protected final function getCurrentSubtableRowId() {}
    protected final function getCurrentSubtable() {}
}


