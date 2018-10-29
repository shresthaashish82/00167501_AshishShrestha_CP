<?php

class forum{
    private $question;
    private $customerID;
    private $visited;
    private $reply;
    private $date;
    private $forum_id;

    /**
     * @return mixed
     */
    public function getForumId()
    {
        return $this->forum_id;
    }

    /**
     * @param mixed $forum_id
     */
    public function setForumId($forum_id)
    {
        $this->forum_id = $forum_id;
    }




    /**
     * @return mixed
     */
    public function getCustomerID()
    {
        return $this->customerID;
    }

    /**
     * @param mixed $customerID
     */
    public function setCustomerID($customerID)
    {
        $this->customerID = $customerID;
    }

    /**
     * @return mixed
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param mixed $date
     */
    public function setDate($date)
    {
        $this->date = $date;
    }

    /**
     * @return mixed
     */
    public function getQuestion()
    {
        return $this->question;
    }

    /**
     * @param mixed $question
     */
    public function setQuestion($question)
    {
        $this->question = $question;
    }

    /**
     * @return mixed
     */
    public function getReply()
    {
        return $this->reply;
    }

    /**
     * @param mixed $reply
     */
    public function setReply($reply)
    {
        $this->reply = $reply;
    }

    /**
     * @return mixed
     */
    public function getVisited()
    {
        return $this->visited;
    }

    /**
     * @param mixed $visited
     */
    public function setVisited($visited)
    {
        $this->visited = $visited;
    }

    public function postQuestion(){
        $question = $this->getQuestion();
        $customerID=$this->getCustomerID();
        $postQuestion="insert into forum(question,customerId,visited,reply,post_date) values('$question',$customerID,0,0,now())";
        return $postQuestion;

    }
    public function selectForum(){
        $selectForumSQL = "select * from forum";
        return $selectForumSQL;
    }

    public function getForumById($id){
        $selectForumById = "select * from forum where id='$id'";
        return $selectForumById;
    }

    public function forumReply(){
        $replier_id=$this->getCustomerID();
        $forum_id=$this->getForumId();
        $reply=$this->getReply();
        $forumReply= "insert into forum_reply(replier_id,forum_id,reply,reply_date) values($replier_id,$forum_id,'$reply',now())";
        return $forumReply;
    }

    public function updateReplyCount($forum_id){
        $updateReplyCount = "update forum set reply=reply+1 where id=$forum_id";
        return $updateReplyCount;
    }

    public function selectReply(){
        $selectReplySQL="select * from forum_reply";
        return $selectReplySQL;
    }

    public function selectReplyById($forum_id){
        $selectReplySQL="select * from forum_reply where forum_id=$forum_id";
        return $selectReplySQL;
    }

    public function updateForumVisit($forum_id){
        $updateVisit = "update forum set visited = visited+1 where id=$forum_id";
        return $updateVisit;
    }

}