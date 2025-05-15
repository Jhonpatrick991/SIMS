CREATE TABLE IF NOT EXISTS Students (
    StudentNumber VARCHAR(20) PRIMARY KEY,
    StudentName VARCHAR(100) NOT NULL,
    Course VARCHAR(100) NOT NULL,
    SubjectCode VARCHAR(20) NOT NULL,
    Email VARCHAR(100) NOT NULL UNIQUE
);

CREATE TABLE IF NOT EXISTS Sections (
    SectionId INT PRIMARY KEY,
    SectionName VARCHAR(100) NOT NULL,
    StudentsEnrolled INT NOT NULL
);

CREATE TABLE IF NOT EXISTS Subjects (
    ID INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    SubjectCode VARCHAR(20) UNIQUE,
    Unit INT NOT NULL,
    SubjectName VARCHAR(255) NOT NULL,
    TotalSections INT NOT NULL DEFAULT 0,
    StudentsEnrolled INT DEFAULT 0,
    Time VARCHAR(50) NOT NULL
);

CREATE TABLE IF NOT EXISTS Grades (
    StudentNumber VARCHAR(20),
    SubjectCode VARCHAR(20),
    Semester VARCHAR(10),
    Prelim DECIMAL(5,2) NOT NULL DEFAULT 1.0,
    Midterm DECIMAL(5,2) NOT NULL DEFAULT 1.0,
    SemiFinal DECIMAL(5,2) NOT NULL DEFAULT 1.0,
    Final DECIMAL(5,2) NOT NULL DEFAULT 1.0,
    GWA DECIMAL(5,2) NOT NULL DEFAULT 1.0,
    PRIMARY KEY (StudentNumber, SubjectCode)
);

CREATE TABLE IF NOT EXISTS StudentSubjects (
    StudentNumber VARCHAR(20),
    SubjectCode VARCHAR(20),
    PRIMARY KEY (StudentNumber, SubjectCode),
    FOREIGN KEY (StudentNumber) REFERENCES Students(StudentNumber),
    FOREIGN KEY (SubjectCode) REFERENCES Subjects(SubjectCode)
);

