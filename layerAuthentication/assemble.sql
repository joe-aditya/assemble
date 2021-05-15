CREATE TABLE USER_PROFILE(
USER_ID VARCHAR(15) PRIMARY KEY,
USER_NAME VARCHAR(20) NOT NULL,
PASSWORD VARCHAR(10) NOT NULL,
NAME VARCHAR(20) NOT NULL,
PH_NO NUMBER(10) NOT NULL,
SEX VARCHAR(6) CHECK (SEX = 'MALE' OR SEX = 'FEMALE'),
DOB DATE NOT NULL,
ORG_NAME VARCHAR(30) NOT NULL,
MAIL_ID VARCHAR(30) NOT NULL,
SOCIAL_MEDIA_LINKS VARCHAR(100),
BIO VARCHAR(200) NOT NULL
);

//////////////////////

CREATE TABLE TEAM (
TEAM_ID VARCHAR(15) PRIMARY KEY,
TEAM_NAME VARCHAR(20) NOT NULL,
MOTIVE VARCHAR(30),
TEAM_DESC VARCHAR(30) NOT NULL,
SKILL_REQ VARCHAR(40) NOT NULL,
TEAM_OWNER VARCHAR(20) ,
MEM_REQUIRED NUMBER(10),
DEADLINE_OF_PRJCT DATE NOT NULL,
FORIEGN KEY (TEAM_OWNER) REFERNCES USER_PROFILE(USER_NAME)
);

/////////////////////////////////

CREATE TABLE TEAM_MEMBERS(
TEAM_ID VARCHAR(15),
USER_ID VARCHAR(15),
FORIEGN KEY (USER_ID) REFERNCES USER_PROFILE(USER_NAME),
FORIEGN KEY (TEAM_ID) REFERNCES TEAM (TEAM_ID),
);

/////////////////////////////

CREATE TABLE TEAM_REQUEST(
REQUEST_ID VARCHAR(15) PRIMARY KEY,
TEAM_ID VARCHAR(15),
USER_ID VARCHAR(15),
FORIEGN KEY (USER_ID) REFERNCES USER_PROFILE(USER_NAME),
FORIEGN KEY (TEAM_ID) REFERNCES TEAM (TEAM_ID)
);

//////////////////////////////////////////

CREATE TABLE REVIEWER(
ADMID_ID VARCHAR(15) PRIMARY KEY,
AD_USERNAME VARCHAR(20) NOT NULL ,
AD_PWD VARCHAR(10) NOT NULL
);

////////////////////////////

CREATE TABLE REPORT(
REPORT_ID VARCHAR(10) PRIMARY KEY,
REPORT_BY VARCHAR(20) NOT NULL,
REPORTED_USER VARCHAR(20) NOT NULL,
REASON VARCHAR(100)
);

/////////////////////

CREATE TABLE SKILL_SET(
USER_ID VARCHAR(15) ,
SKILL_ID VARCHAR(20) PRIMARY KEY,
SKILLS VARCHAR(100),
BIO VARCHAR(200),
PAST_EXPR VARCHAR(100),
PRJCT_CMPLTD VARCHAR(100),
FORIEGN KEY (USER_ID) REFERNCES USER_PROFILE(USER_NAME)
);

//////////////////////////