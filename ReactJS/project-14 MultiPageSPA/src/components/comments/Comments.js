import { useState, useEffect } from 'react';
import { useParams } from 'react-router-dom';

import classes from './Comments.module.css';
import NewCommentForm from './NewCommentForm';
import useHttp from '../../hooks/use-http';
import { getAllComments } from '../../lib/api';
import CommentsList from './CommentsList';
import LoadingSpinner from '../UI/LoadingSpinner';



const Comments = () => {
  const [isAddingComment, setIsAddingComment] = useState(false);
  const params = useParams();

  const {quoteId} = params;

  const {sendRequest, status, data: loadedComments} = useHttp(getAllComments);

  useEffect(() => {
    sendRequest(quoteId);
  },[quoteId,sendRequest]);

  const startAddCommentHandler = () => {
    setIsAddingComment(true);
  };
  
  // const startAddCommentHandler = () => {};

  let comments;

  if(status === 'pending'){
    comments = ( 
    <div className='centered'>
        <LoadingSpinner />
    </div>
    );
}

if(status === 'completed' && (loadedComments && loadedComments.length > 0)){
  comments = <CommentsList comments={loadedComments}/>
}

if(status === 'completed' && (!loadedComments || loadedComments.length === 0)){
  comments = ( 
    <p className='centered'>
        No comments were added yet!
    </p>
    );
}


  return (
    <section className={classes.comments}>
      <h2>User Comments</h2>
      {!isAddingComment && (
        <button className='btn' onClick={startAddCommentHandler}>
          Add a Comment
        </button>
      )}
      {isAddingComment && <NewCommentForm 
      quoteId={params.quoteId} onAddedComment={startAddCommentHandler}/>}
      {comments}
    </section>
  );
};

export default Comments;