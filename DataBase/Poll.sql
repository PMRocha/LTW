DROP TABLE IF EXISTS Userino;
DROP TABLE IF EXISTS Poll;
DROP TABLE IF EXISTS Question;
DROP TABLE IF EXISTS Answer;
DROP TABLE IF EXISTS AnswerToPoll;
DROP TABLE IF EXISTS AnswerResult;

CREATE TABLE Userino (
	UserID INTEGER PRIMARY KEY AUTOINCREMENT,
	password CHAR(20) NOT NULL,
	userName CHAR(20) NOT NULL UNIQUE
);

CREATE TABLE Poll (
	PollId INTEGER PRIMARY KEY AUTOINCREMENT,
	CreatorID INTEGER,
	PrivatePoll Boolean default 'False',
	FOREIGN KEY(CreatorID) REFERENCES Userino(UserID)
	);

CREATE TABLE Question (
	QuestionID INTEGER PRIMARY KEY AUTOINCREMENT,
	QuestionText CHAR(150),
	QuestionPoll INTEGER,
	FOREIGN KEY(QuestionPoll) REFERENCES Poll(PollId)
);

CREATE TABLE Answer (
	AnswerID INTEGER PRIMARY KEY AUTOINCREMENT,
	AnswerOption CHAR(100),
	AnswerToQuestion INTEGER,
	FOREIGN KEY(AnswerToQuestion) REFERENCES Question(QuestionID)
);

CREATE TABLE AnswerToPoll (
	AnsweredPollId INTEGER,
	AnsweredUserID INTEGER,
	FOREIGN KEY(AnsweredPollId) REFERENCES Poll(PollId),
	FOREIGN KEY(AnsweredUserID) REFERENCES Userino(UserID)
);

CREATE TABLE AnswerResult (
	AnswerResults INTEGER,
	ResultCont INTEGER default 0,
	FOREIGN KEY(AnswerResults) REFERENCES Answer(AnswerID)
);

INSERT INTO Userino (password,userName)
VALUES ('qwerty','user');

INSERT INTO Userino (password,userName)
VALUES ('qwerty','user21');

/*
Creating a Poll

BEGIN TRANSACTON
 -> TODO KILL MYSELF
COMMIT TRANSACTION

Getting a Poll

BEGIN TRANSACTON
SELECT * FORM QUESTION WHERE QuestionPoll IS $PollID;
SELECT * FORM ANSWER WHERE AnswerToQuestion IS $QuestionID;
COMMIT TRANSACTION

Commiting an answer to a poll

BEGIN TRANSACTON
INSERT INTO AnswerToPoll(AnsweredPollId,AnsweredUserID) VALUES ($PollID,$UserID);
UPDATE AnswerResult SET ResultCont = ResultCont+1 WHERE AnswerResults = $AnswerID;
COMMIT TRANSACTION
*/