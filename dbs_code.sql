--1-User
CREATE TABLE Users (
    UserID int NOT NULL PRIMARY KEY,
	FirstName nvarchar(255) NOT NULL,
    LastName nvarchar(255) NOT NULL,
	Email nvarchar(255) NOT NULL Unique,
    UserName nvarchar(255) NOT NULL,
	UserVerified bit NOT NULL,
    UserPassword nvarchar(255) NOT NULL,
	PhoneNumber nvarchar(20) NOT NULL,
	DateJoined DATETIMEOffset NOT NULL,
);




--2-province
CREATE TABLE Province (
    ProvinceID int NOT NULL PRIMARY KEY,
	Title nvarchar(255) NOT NULL,
);

--3-city
CREATE TABLE City (
    CityID int NOT NULL PRIMARY KEY,
	Title nvarchar(255) NOT NULL,
	ProvinceID int NOT NULL FOREIGN KEY REFERENCES Province(ProvinceID)
);

--4-field
CREATE TABLE Field (
    FieldID int NOT NULL PRIMARY KEY,
	Title nvarchar(255) NOT NULL,
);

--5-bonus
CREATE TABLE Bonus (
    BonusID int NOT NULL PRIMARY KEY,
	Title nvarchar(255) NOT NULL,

);


--6-contest
CREATE TABLE Contest (
    ContestID int NOT NULL PRIMARY KEY,
	Title nvarchar(255) NOT NULL,
    Details nvarchar(255) ,
	Submition DateTimeOffset NOT NULL,
	Duration float(24) NOT NULL,
	Featured bit NOT NULL,
);



--7-institution
CREATE TABLE Institution (
    InstitutionID int NOT NULL PRIMARY KEY,
	Title nvarchar(255) NOT NULL,
    Kind int NOT NULL,
	Website nvarchar(255),
	CityID int NOT NULL FOREIGN KEY REFERENCES City(CityID)
);

--8-developer
CREATE TABLE Developer (
    DeveloperID int NOT NULL PRIMARY KEY,
	SSN nvarchar(255) ,
	DateOfBirth DateTimeOffset,
	Age int,
	ProfilePicURL nvarchar(255),
	DevRank float,
	EmploymentStatus int NOT NULL,
    EmploymentKind int,
	UserID int FOREIGN KEY REFERENCES Users(UserID),
	InstitutionID int FOREIGN KEY REFERENCES Institution(InstitutionID),
	CityID int NOT NULL FOREIGN KEY REFERENCES City(CityID),
);

--9-class
CREATE TABLE Class (
    ClassID int NOT NULL PRIMARY KEY,
	ClassName nvarchar(255) NOT NULL,
--  profid int not null,
	SignInPossible bit NOT NULL,
	ClassPassword nvarchar(64),
	AttendeeRecognition int NOT NULL,
	ProfilePicURL nvarchar(255),
	Archive bit NOT NULL, 
	AcademicYear int NOT NULL,
	ProfName nvarchar(255) NOT NULL,
	MaxAttendees int NOT NULL,
	PhoneNumber nvarchar(20) NOT NULL,
	AgreeToShareQuestions bit NOT NULL,
	InstitutionID int NOT NULL FOREIGN KEY REFERENCES Institution(InstitutionID),
	Detail nvarchar(MAX),

);

--10- developer_class
CREATE TABLE Developer_Class (
    Dev_ClassID int NOT NULL PRIMARY KEY,
	StudentID nvarchar(255),
	DeveloperID int FOREIGN KEY REFERENCES Developer(DeveloperID),
	ClassID int FOREIGN KEY REFERENCES Class(ClassID),
);

--11-class_admin
CREATE TABLE ClassAdmin (
    ClassAdminID int NOT NULL PRIMARY KEY,
	DeveloperID int NOT NULL FOREIGN KEY REFERENCES Developer(DeveloperID),
	ClassID int NOT NULL FOREIGN KEY REFERENCES Class(ClassID),
);

--12-Assignments
CREATE TABLE Assignment (
    AssignmentID int NOT NULL PRIMARY KEY,
	Deadline DateTimeOffset,
	SubmitionDate DateTimeOffset,
	ClassID int NOT NULL FOREIGN KEY REFERENCES Class(ClassID),
);


--13-Questions
CREATE TABLE Question (
    QuestionID int NOT NULL PRIMARY KEY,
	Title nvarchar(255) NOT NULL,
	TimeLimit int NOT NULL,
	MemoryLimit int NOT NULL,
	Details nvarchar(255) NOT NULL,
	RequieredLanguage int,
	QStatus int NOT NULL,
	Score int NOT NULL,
	Sharable bit NOT NULL,
	QuestionCategory int NOT NULL,
	ContestID int FOREIGN KEY REFERENCES Contest(ContestID),
);


--14-questiontags
CREATE TABLE QuestionTag (
    QuestionTagID int NOT NULL PRIMARY KEY,
	Title nvarchar(255) NOT NULL,
);

--15-qtatq
CREATE TABLE QuestionTag_Question (
    QuestionTag_QuestionsID int NOT NULL PRIMARY KEY,
	QuestionID int NOT NULL FOREIGN KEY REFERENCES Question(QuestionID),
	QuestionTagID int NOT NULL FOREIGN KEY REFERENCES QuestionTag(QuestionTagID),

);

--16-contest participant
CREATE TABLE ContestParticipant (
    ContestParticipantID int NOT NULL PRIMARY KEY,
	DeveloperID int NOT NULL FOREIGN KEY REFERENCES Developer(DeveloperID),
	ContestID int NOT NULL FOREIGN KEY REFERENCES Contest(ContestID),
);

--17-question - assignment
CREATE TABLE Question_assignment (
    Question_AssignmentID int NOT NULL PRIMARY KEY,
	AssignmentID int NOT NULL FOREIGN KEY REFERENCES Assignment(AssignmentID),
	QuestionID int NOT NULL FOREIGN KEY REFERENCES Question(QuestionID),
);

--18-contests_institution
CREATE TABLE Contest_Institution (
    Question_AssignmentID int NOT NULL PRIMARY KEY,
	ContestID int NOT NULL FOREIGN KEY REFERENCES Contest(ContestID),
	InstitutionID int NOT NULL FOREIGN KEY REFERENCES Institution(InstitutionID),
);


--19 company
CREATE TABLE Company(
	CompanyID int  NOT NULL PRIMARY KEY,
	Website nvarchar(255) NOT NULL,
	BriefIntro nvarchar(255) NOT NULL,
	Size int NOT NULL,
	About nvarchar(255) NOT NULL,
	PersianName nvarchar(255) NOT NULL,
	ShowEngName bit NOT NULL,
	LogoURL nvarchar(255) NOT NULL,
	Acceptead bit NOT NULL,
	Address nvarchar(255) NOT NULL,
	LocationURL nvarchar(255) NULL,
	YearFounded int NOT NULL,
	FieldID int NOT NULL,
) 

--19-employer
CREATE TABLE dbo.Employer(
	EID int NOT NULL,
	UserID int NOT NULL,
	CompanyID int FOREIGN KEY REFERENCES Company(CompanyID),
) 



--20- workexp
CREATE TABLE WorkExperience(
	WorkExperienceID int NOT NULL PRIMARY KEY,
	JobTitle nvarchar(60) NOT NULL,
	WorkingSince date NULL,
	WorkingTill date NULL,
	Details nvarchar(255) NULL,
	ProfileTitle nvarchar(60) NULL,
	CompanyID int FOREIGN KEY REFERENCES Company(CompanyID) NOT NULL,
	DeveloperID int FOREIGN KEY REFERENCES Developer(DeveloperID) NOT NULL,
);

-- 21-technology
CREATE TABLE dbo.Technology(
	TechnologyID int PRIMARY KEY,
	Title nvarchar(255) NOT NULL,
) 


--22-tech workxp
CREATE TABLE Technologies_WorkExperience(
	ID int  NOT NULL PRIMARY KEY,
	TechnologyID int NOT NULL FOREIGN KEY REFERENCES Technology(TechnologyID) ,
	WorkExperienceID int NOT NULL FOREIGN KEY REFERENCES WorkExperience(WorkExperienceID),
);

--23-joboffering
CREATE TABLE dbo.JobOffering(
	JobOfferingID int NOT NULL PRIMARY KEY,
	Title nvarchar(255) NOT NULL,
	Kind int NOT NULL,
	Remote bit NOT NULL,
	Intro nvarchar(500) NOT NULL,
	Requirements nvarchar(500) NULL,
	PostedDataAndTime datetime ,
	Deadline datetime NULL,
	Salary float NULL,
	ExpLevel int NOT NULL,
	CompanyID int  FOREIGN KEY REFERENCES Company(CompanyID) NOT NULL,
	CityID int FOREIGN KEY REFERENCES City(CityID) NOT NULL,
)

--24-tech job
CREATE TABLE Technologies_JobOfferings(
	ID int  NOT NULL PRIMARY KEY,
	TechnologyID int NOT NULL FOREIGN KEY REFERENCES Technology(TechnologyID) ,
	JobOfferingID int NOT NULL FOREIGN KEY REFERENCES JobOffering(JobOfferingID) ,
) ;

--25-- bonus_jobOfferings
CREATE TABLE Bonus_JobOfferings(
	ID int  NOT NULL PRIMARY KEY,
	JobOfferingID int FOREIGN KEY REFERENCES JobOffering(JobOfferingID) NOT NULL,
	BonusID int FOREIGN KEY REFERENCES Bonus(BonusID) NOT NULL,
)

--26- licenses
CREATE TABLE dbo.License(
	LicenseID int NOT NULL,
	Title nvarchar(255) NOT NULL,
	Score float NULL,
	Details nvarchar(500) NULL,
	AuthID nvarchar(50) NULL,
	DeveloperID int FOREIGN KEY REFERENCES Developer(DeveloperID) NOT NULL,
) 


--27-edubackground
CREATE TABLE dbo.EducationalBackground(
	EDBakgrundID int NOT NULL,
	EDStage nvarchar(60) NULL,
	Subject nvarchar(60) NULL,
	Since date NULL,
	CurrentlyStudying nvarchar(60) NOT NULL,
	AvarageScore float NULL,
	LogoURL nchar(10) NULL,
	Details nvarchar(100) NULL,
	ProfileTitle nvarchar(60) NULL,
	DevID int NOT NULL,
	InstitutionID int FOREIGN KEY REFERENCES Institution(InstitutionID)NOT NULL,
) 


--28- tech - company
CREATE TABLE dbo.Technologies_Company(
	ID int  NOT NULL PRIMARY KEY,
	TechnologyID int NOT NULL FOREIGN KEY REFERENCES Technology(TechnologyID),
	CompanyID int NOT NULL FOREIGN KEY REFERENCES Company(CompanyID),
) 


--29- preffered tech
CREATE TABLE dbo.PreferredTechnologies(
	ID int  NOT NULL PRIMARY KEY,
	DeveloperID int NOT NULL FOREIGN KEY REFERENCES Developer(DeveloperID),
	TechnologyID int NOT NULL FOREIGN KEY REFERENCES Technology(TechnologyID),
) 


--30-social media link
CREATE TABLE SocialMediaLinks(
	SocialMediaLID int NOT NULL PRIMARY KEY,
	URL nvarchar(255) NOT NULL,
	LogoURL nvarchar(255) NOT NULL,
) 

--31-social media comp link
CREATE TABLE dbo.SocialMediaLinks_Company(
	ID int  NOT NULL PRIMARY KEY,
	SocialMediaLID int NOT NULL FOREIGN KEY REFERENCES SocialMediaLinks(SocialMediaLID),
	CompanyID int NOT NULL FOREIGN KEY REFERENCES Company(CompanyID),
) 


--32-cities operating
CREATE TABLE dbo.CitiesOperating(
	ID int  NOT NULL PRIMARY KEY,
	CityID int FOREIGN KEY REFERENCES City(CityID) NOT NULL,
	CompanyID int NOT NULL FOREIGN KEY REFERENCES Company(CompanyID),
) 


--33- job submition
CREATE TABLE JobSubmition(
	ID int  NOT NULL PRIMARY KEY,
	JobOfferingID int FOREIGN KEY REFERENCES JobOffering(JobOfferingID) NOT NULL,
	DeveloperID int NOT NULL FOREIGN KEY REFERENCES Developer(DeveloperID),
	Accepted bit,
)

--34-submitions
CREATE TABLE Submitions(
	SubmitionsID int NOT NULL PRIMARY KEY,
	DeveloperID int NOT NULL FOREIGN KEY REFERENCES Developer(DeveloperID),
	QuestionID int NOT NULL FOREIGN KEY REFERENCES Question(QuestionID),
	Solved bit NULL,
	Score float NULL,
	DataAndTime datetime NULL,
) 


--35- contest comp
CREATE TABLE Contest_CompanyHost(
	ID int  NOT NULL PRIMARY KEY,
	ContestID int NOT NULL FOREIGN KEY REFERENCES Contest(ContestID),
	CompanyID int NOT NULL FOREIGN KEY REFERENCES Company(CompanyID),
)









